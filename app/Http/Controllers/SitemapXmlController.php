<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Portfolio;

class SitemapXmlController extends Controller
{
    public function index()
    {

        $articles = Article::query()->where('status', true)->select('slug', 'created_at')->get();
        $portfolios = Portfolio::query()->where('status', true)->select('slug', 'created_at')->get();
        $lastModHome = Article::query()->where('status', true)->select('created_at')->latest()->first()->created_at;
        return response()->view('sitemap', [
            'articles' => $articles,
            'portfolios' => $portfolios,
            'lastModHome' => $lastModHome,
        ])->header('Content-Type', 'text/xml');
    }
}
