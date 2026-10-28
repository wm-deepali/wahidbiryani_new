<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\FranchiseEnquiry;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use App\Models\Outlet;
use App\Models\Setting;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use App\Services\Email\EmailDispatcher;

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

    public function ourOutlets()
    {
        $outlets = Outlet::active()->ordered()->get();

        return view('front-pages.our-outlets', compact('outlets'));
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

    public function imageGallery()
    {
        $images = GalleryImage::active()->ordered()->get();

        return view('front-pages.image-gallery', compact('images'));
    }

    public function videoGallery()
    {
        // Uploaded videos, plus link videos whose link can be turned into an embed
        $videos = GalleryVideo::active()->ordered()->get()
            ->filter(fn($video) => $video->isUpload() ? $video->video_file_url : $video->embed_url)
            ->values();

        return view('front-pages.video-gallery', compact('videos'));
    }

    public function feedback()
    {
        $outlets = Outlet::active()->ordered()->get();

        return view('front-pages.feedback', compact('outlets'));
    }

    public function franchise()
    {
        return view('front-pages.franchise');
    }

    // ── Thank-you page ──────────────────────────────────────────────────────

    /**
     * Only reachable right after a form submit (the type is flashed to the
     * session). Opening /thank-you directly sends the visitor to the home page.
     */
    public function thankYou()
    {
        $type = session('thank_you');

        if (!in_array($type, ['contact', 'feedback', 'franchise'], true)) {
            return redirect()->route('home');
        }

        return view('front-pages.thank-you', compact('type'));
    }

    /**
     * Success response for the three forms.
     * AJAX / fetch submits get JSON with a "redirect" URL; a normal form post
     * is redirected straight to the thank-you page.
     */
    private function thankYouResponse(Request $request, string $type, string $message)
    {
        session()->flash('thank_you', $type);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'redirect' => route('thank-you'),
            ]);
        }

        return redirect()->route('thank-you');
    }

    // ── Form submissions ────────────────────────────────────────────────────

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

        // Admin notification (needs the SMTP switch AND the template to be on)
        EmailDispatcher::sendToAdmin('contact-enquiry', [
            '{name}' => $data['name'],
            '{email}' => $data['email'],
            '{phone}' => $data['phone'],
            '{request_type}' => $data['request'],
            '{message}' => $data['message'],
        ]);

        return $this->thankYouResponse($request, 'contact', 'Thank you for writing to us.');
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

        EmailDispatcher::sendToAdmin('feedback', [
            '{name}' => $data['name'],
            '{email}' => $data['email'],
            '{phone}' => $data['phone'],
            '{outlet}' => $data['branch'],
            '{message}' => $data['message'],
        ]);

        return $this->thankYouResponse($request, 'feedback', 'Thank you for your feedback.');
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

        EmailDispatcher::sendToAdmin('franchise-enquiry', [
            '{name}' => $data['name'],
            '{email}' => $data['email'],
            '{phone}' => $data['phone'],
            '{city}' => $data['city'],
            '{budget}' => $data['budget'],
            '{message}' => $data['message'],
        ]);

        return $this->thankYouResponse($request, 'franchise', 'Thank you for your interest.');
    }

}