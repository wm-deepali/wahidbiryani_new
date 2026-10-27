<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\FranchiseEnquiry;
use App\Models\Outlet;
use App\Models\Setting;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;

class FrontController extends Controller
{

    public function home(Request $request)
    {
        return view('front-pages.home');
    }

    public function faqs()
    {
        $faqs = Faq::active()->ordered()->get();

        return view('front-pages.faq', compact('faqs'));
    }

    public function blogs()
    {
        $blogs = Blog::active()->latestFirst()->paginate(9);

        return view('front-pages.blogs', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('front-pages.blog-detail', compact('blog'));
    }

    public function contact()
    {
        $outlets = Outlet::active()->ordered()->get();
        $settings = Setting::first();

        return view('front-pages.contact', compact('outlets', 'settings'));
    }

    public function menu()
    {
        $categories = MenuCategory::active()->ordered()
            ->with(['items' => fn($q) => $q->active()->ordered()])
            ->get()
            ->filter(fn($category) => $category->items->isNotEmpty())
            ->values();

        $currency = Setting::first()?->currency_symbol ?: '₹';

        return view('front-pages.menu', compact('categories', 'currency'));
    }

    public function storeContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'request' => 'required|string|max:120',
            'message' => 'required|string|max:3000',
        ]);

        ContactEnquiry::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'request_type' => $data['request'],
            'message' => $data['message'],
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Thank you for writing to us.']);
    }

    public function feedback()
    {
        $outlets = Outlet::active()->ordered()->get();

        return view('front-pages.feedback', compact('outlets'));
    }

    public function storeFeedback(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'branch' => 'required|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        Feedback::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'outlet' => $data['branch'],
            'message' => $data['message'],
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Thank you for your feedback.']);
    }

    public function franchise()
    {
        return view('front-pages.franchise');
    }

    public function storeFranchiseEnquiry(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'city' => 'required|string|max:120',
            'budget' => 'required|string|max:60',
            'message' => 'required|string|max:3000',
        ]);

        FranchiseEnquiry::create($data + ['ip_address' => $request->ip()]);

        return response()->json(['message' => 'Thank you for your interest.']);
    }
}

