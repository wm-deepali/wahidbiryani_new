<?php

namespace App\Http\Controllers;

use App\Models\SeoPage;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = SeoPage::active()
            ->where('in_sitemap', true)
            ->where('robots', 'not like', 'noindex%')
            ->orderByDesc('sitemap_priority')
            ->get();

        return response()
            ->view('sitemap', compact('pages'))
            ->header('Content-Type', 'application/xml');
    }

    public function robots()
    {
        $body = "User-agent: *\n"
              . "Disallow: /admin\n"
              . "Disallow: /login\n\n"
              . 'Sitemap: ' . url('/sitemap.xml') . "\n";

        return response($body, 200)->header('Content-Type', 'text/plain');
    }
}