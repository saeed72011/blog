<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{\Carbon\Carbon::parse($lastModHome)->toDateString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ route('blog') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($articles->last()->updated_at)->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>8.0</priority>
    </url>

    @foreach ($articles as $article)
        <url>
            <loc>{{route('blog.detail', ['article' => $article->slug])}}</loc>
            <lastmod>{{\Carbon\Carbon::parse($article->updated_at)->toDateString()  }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <url>
        <loc>{{ route('portfolio') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($portfolios->last()->updated_at )->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    @foreach ($portfolios as $portfolio)
        <url>
            <loc>{{route('portfolio.detail', ['portfolio' => $portfolio->slug])}}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($portfolio->updated_at)->toDateString()  }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach


</urlset>
