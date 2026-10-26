<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\ContactEnquiry;
use App\Models\DynamicPage;
use App\Models\Faq;
use App\Models\KnowledgeBaseEnquiry;
use App\Models\PackageEnquiry;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();
        $todayStart = $now->copy()->startOfDay();
        $weekStart = $now->copy()->subDays(7);
        $prevWeekStart = $now->copy()->subDays(14);

        // ── Per-source counts ───────────────────────────────────────────────
        $sources = [
            'contact' => ['label' => 'Contact', 'model' => ContactEnquiry::class, 'color' => '#303d89'],
            'package' => ['label' => 'Package', 'model' => PackageEnquiry::class, 'color' => '#007a5e'],
            'kb' => ['label' => 'Knowledge Base', 'model' => KnowledgeBaseEnquiry::class, 'color' => '#0069d9'],
            'applications' => ['label' => 'Job Applications', 'model' => CareerApplication::class, 'color' => '#916a00'],
        ];

        $stats = [];
        foreach ($sources as $key => $source) {
            $model = $source['model'];
            $stats[$key] = [
                'total' => $model::count(),
                'today' => $model::where('created_at', '>=', $todayStart)->count(),
                'week' => $model::where('created_at', '>=', $weekStart)->count(),
                'prev_week' => $model::whereBetween('created_at', [$prevWeekStart, $weekStart])->count(),
            ];
        }

        $leads = [
            'total' => array_sum(array_column($stats, 'total')),
            'today' => array_sum(array_column($stats, 'today')),
            'week' => array_sum(array_column($stats, 'week')),
            'change' => $this->percentChange(
                array_sum(array_column($stats, 'prev_week')),
                array_sum(array_column($stats, 'week'))
            ),
        ];

        // ── Status breakdown (contact + package + knowledge base) ───────────
        $statusModels = [ContactEnquiry::class, PackageEnquiry::class, KnowledgeBaseEnquiry::class];
        $statusCounts = ['new' => 0, 'contacted' => 0, 'closed' => 0];

        foreach ($statusModels as $model) {
            $rows = $model::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

            foreach ($statusCounts as $status => $count) {
                $statusCounts[$status] += (int) ($rows[$status] ?? 0);
            }
        }

        $statusTotal = array_sum($statusCounts);

        // ── Mobile OTP verification rate (contact + package) ────────────────
        $verifiedTotal = ContactEnquiry::count() + PackageEnquiry::count();
        $verifiedCount = ContactEnquiry::where('mobile_verified', true)->count()
            + PackageEnquiry::where('mobile_verified', true)->count();
        $verifiedRate = $verifiedTotal > 0 ? round(($verifiedCount / $verifiedTotal) * 100) : 0;

        // ── 14-day trend chart ──────────────────────────────────────────────
        $chartFrom = $now->copy()->subDays(13)->startOfDay();
        $days = collect(range(0, 13))->map(fn($i) => $chartFrom->copy()->addDays($i));

        $chart = [
            'labels' => $days->map(fn($d) => $d->format('d M'))->all(),
            'datasets' => [],
        ];

        foreach ($sources as $source) {
            $daily = $source['model']::where('created_at', '>=', $chartFrom)
                ->selectRaw('DATE(created_at) as d, count(*) as total')
                ->groupBy('d')
                ->pluck('total', 'd');

            $chart['datasets'][] = [
                'label' => $source['label'],
                'color' => $source['color'],
                'data' => $days->map(fn($d) => (int) ($daily[$d->toDateString()] ?? 0))->all(),
            ];
        }

        // ── Top services / packages ─────────────────────────────────────────
        $topServices = ContactEnquiry::whereNotNull('service')
            ->where('service', '!=', '')
            ->selectRaw('service, count(*) as total')
            ->groupBy('service')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $topPackages = PackageEnquiry::whereNotNull('page')
            ->where('page', '!=', '')
            ->selectRaw('page, count(*) as total')
            ->groupBy('page')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->map(fn($row) => (object) [
                'label' => Str::headline($row->page),
                'total' => $row->total,
            ]);

        // ── Content snapshot ────────────────────────────────────────────────
        $content = [
            'blogs' => Blog::active()->count(),
            'careers' => Career::active()->count(),
            'faqs' => Faq::active()->count(),
            'pages' => DynamicPage::active()->count(),
        ];

        // ── Latest activity feed ────────────────────────────────────────────
        $recent = collect()
            ->merge(ContactEnquiry::latest()->take(6)->get()->map(fn($e) => [
                'type' => 'Contact',
                'name' => $e->full_name,
                'detail' => $e->service ?: Str::limit($e->message, 45),
                'status' => $e->status,
                'verified' => (bool) $e->mobile_verified,
                'at' => $e->created_at,
                'url' => route('admin.enquiries.show', $e),
            ]))
            ->merge(PackageEnquiry::latest()->take(6)->get()->map(fn($e) => [
                'type' => 'Package',
                'name' => $e->name,
                'detail' => $e->page ? $e->page_label : '—',
                'status' => $e->status,
                'verified' => (bool) $e->mobile_verified,
                'at' => $e->created_at,
                'url' => route('admin.package-enquiries.show', $e),
            ]))
            ->merge(KnowledgeBaseEnquiry::latest()->take(6)->get()->map(fn($e) => [
                'type' => 'Knowledge Base',
                'name' => $e->name,
                'detail' => Str::headline((string) $e->need),
                'status' => $e->status,
                'verified' => null,
                'at' => $e->created_at,
                'url' => route('admin.kb-enquiries.index'),
            ]))
            ->merge(CareerApplication::latest()->take(6)->get()->map(fn($e) => [
                'type' => 'Job Application',
                'name' => $e->name,
                'detail' => $e->position ?: '—',
                'status' => null,
                'verified' => null,
                'at' => $e->created_at,
                'url' => route('admin.career-applications.index'),
            ]))
            ->sortByDesc('at')
            ->take(8)
            ->values();

        return view('admin.dashboard.index', compact(
            'sources',
            'stats',
            'leads',
            'statusCounts',
            'statusTotal',
            'verifiedRate',
            'verifiedCount',
            'verifiedTotal',
            'chart',
            'topServices',
            'topPackages',
            'content',
            'recent'
        ));
    }

    private function percentChange($old, $new): float
    {
        if ($old <= 0) {
            return $new > 0 ? 100.0 : 0.0;
        }

        return round((($new - $old) / $old) * 100, 1);
    }
}