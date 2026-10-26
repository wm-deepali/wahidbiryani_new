<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($pages as $page)
    <url>
        <loc>{{ $page->canonical_url ?: url($page->slug ?: '/') }}</loc>
        <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
        <changefreq>{{ $page->sitemap_changefreq }}</changefreq>
        <priority>{{ number_format($page->sitemap_priority, 1) }}</priority>
    </url>
@endforeach
</urlset>