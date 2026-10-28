<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactEnquiry;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\FranchiseEnquiry;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Outlet;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();
        $thisMonth = $now->copy()->startOfMonth();
        $lastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();

        // ── KPI: enquiries (this month vs last month) ──────────────────────
        $models = [
            'contact' => ContactEnquiry::class,
            'feedback' => Feedback::class,
            'franchise' => FranchiseEnquiry::class,
        ];

        $kpi = [];
        $totalThis = 0;
        $totalLast = 0;

        foreach ($models as $key => $model) {
            $this_ = $model::where('created_at', '>=', $thisMonth)->count();
            $last_ = $model::whereBetween('created_at', [$lastMonth, $thisMonth])->count();

            $kpi[$key] = [
                'total' => $model::count(),
                'month' => $this_,
                'change' => self::percentChange($this_, $last_),
            ];

            $totalThis += $this_;
            $totalLast += $last_;
        }

        $totals = [
            'all' => array_sum(array_column($kpi, 'total')),
            'month' => $totalThis,
            'change' => self::percentChange($totalThis, $totalLast),
        ];

        // ── Chart: submissions per day, last 30 days ───────────────────────
        $from = $now->copy()->subDays(29)->startOfDay();

        $days = collect(range(0, 29))->map(fn ($i) => $from->copy()->addDays($i));
        $labels = $days->map(fn (Carbon $d) => $d->format('d M'))->all();

        $chart = [];
        foreach ($models as $key => $model) {
            $counts = $model::where('created_at', '>=', $from)
                ->selectRaw('DATE(created_at) as d, COUNT(*) as c')
                ->groupBy('d')
                ->pluck('c', 'd');

            $chart[$key] = $days->map(fn (Carbon $d) => (int) ($counts[$d->toDateString()] ?? 0))->all();
        }

        // ── Recent submissions (all three forms, newest first) ─────────────
        $recent = collect()
            ->merge(ContactEnquiry::latest()->take(8)->get()->map(fn ($r) => [
                'type' => 'Contact',
                'name' => $r->name,
                'phone' => $r->phone,
                'detail' => $r->request_type,
                'at' => $r->created_at,
                'url' => route('admin.contact-enquiries.show', $r->id),
            ]))
            ->merge(Feedback::latest()->take(8)->get()->map(fn ($r) => [
                'type' => 'Feedback',
                'name' => $r->name,
                'phone' => $r->phone,
                'detail' => $r->outlet,
                'at' => $r->created_at,
                'url' => route('admin.feedbacks.show', $r->id),
            ]))
            ->merge(FranchiseEnquiry::latest()->take(8)->get()->map(fn ($r) => [
                'type' => 'Franchise',
                'name' => $r->name,
                'phone' => $r->phone,
                'detail' => $r->city . ($r->budget ? ' · ' . $r->budget : ''),
                'at' => $r->created_at,
                'url' => route('admin.franchise-enquiries.show', $r->id),
            ]))
            ->sortByDesc('at')
            ->take(8)
            ->values();

        // ── Franchise enquiries by budget ──────────────────────────────────
        $budgets = FranchiseEnquiry::selectRaw('budget, COUNT(*) as c')
            ->groupBy('budget')
            ->orderByDesc('c')
            ->pluck('c', 'budget');

        $budgetMax = max(1, (int) $budgets->max());

        // ── Feedback by outlet ─────────────────────────────────────────────
        $feedbackByOutlet = Feedback::selectRaw('outlet, COUNT(*) as c')
            ->groupBy('outlet')
            ->orderByDesc('c')
            ->take(6)
            ->pluck('c', 'outlet');

        $feedbackMax = max(1, (int) $feedbackByOutlet->max());

        // ── Content overview ───────────────────────────────────────────────
        $content = [
            ['label' => 'Active Outlets', 'icon' => 'fa-store', 'count' => Outlet::active()->count(), 'route' => 'admin.outlets.index'],
            ['label' => 'Menu Categories', 'icon' => 'fa-list', 'count' => MenuCategory::count(), 'route' => 'admin.menu-categories.index'],
            ['label' => 'Menu Items', 'icon' => 'fa-utensils', 'count' => MenuItem::count(), 'route' => 'admin.menu-items.index'],
            ['label' => 'Blog Posts', 'icon' => 'fa-newspaper', 'count' => Blog::count(), 'route' => 'admin.blogs.index'],
            ['label' => 'Gallery Images', 'icon' => 'fa-image', 'count' => GalleryImage::count(), 'route' => 'admin.gallery-images.index'],
            ['label' => 'Gallery Videos', 'icon' => 'fa-video', 'count' => GalleryVideo::count(), 'route' => 'admin.gallery-videos.index'],
            ['label' => 'FAQs', 'icon' => 'fa-circle-question', 'count' => Faq::count(), 'route' => 'admin.faqs.index'],
        ];

        return view('admin.dashboard.index', compact(
            'kpi',
            'totals',
            'labels',
            'chart',
            'recent',
            'budgets',
            'budgetMax',
            'feedbackByOutlet',
            'feedbackMax',
            'content'
        ));
    }

    /**
     * Percent change vs the previous period. null = nothing to compare with.
     */
    private static function percentChange(int $current, int $previous): ?float
    {
        if ($previous === 0) {
            return null;
        }

        return round((($current - $previous) / $previous) * 100, 1);
    }
}