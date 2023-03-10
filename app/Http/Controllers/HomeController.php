<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public Setting $setting;


    public function __construct()
    {
        $this->setting = Setting::first();
    }

    public function home()
    {
        $articles = Article::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->take(3)
            ->get();

        $sliders = Slider::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->take(3)
            ->get();

        $portfolios = Portfolio::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->take(3)
            ->get();

        $teams = Team::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->orderBy('sort')
            ->get();


        return view('controllers.client.home', [
            'articles' => $articles,
            'sliders' => $sliders,
            'teams' => $teams,
            'portfolios' => $portfolios,
            'title' => $this->setting->title,
            'meta' => $this->setting->meta_desc,
            'canonical' => route('home')
        ]);
    }


    public function articles()
    {
        $categoriesId = DB::table('categorizables')->where('categorizable_type', 'article')->pluck('category_id')->toArray();
        $categories = Category::query()->where('status', true)->whereIn('id', $categoriesId)->get();
        $articles = Article::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->get();


        return view('controllers.client.articles', [
            'categories' => $categories,
            'articles' => $articles,
            'title' => 'وبلاگ',
            'meta' => $this->setting->name . 'وبلاگ - ',
            'canonical' => route('blog')
        ]);

    }

    public function article(Article $article)
    {
        $article->incrementCalculate();

        $articlesId = DB::table('categorizables')->where('categorizable_type', 'article')->pluck('categorizable_id')->toArray();
        if ($article->categories()->exists()) {
        $relatedArticles = Article::query()
            ->whereNot('id', $article->id)
            ->whereIn('id', $articlesId)
            ->where('status', true)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        }
    else {
        $relatedArticles = (object)[];
    }

        if ($article->published()) {
            return view('controllers.client.article', [
                'article' => $article,
                'relatedArticles' => $relatedArticles,
                'title' => $article->title,
                'meta' => $article->meta_desc,
                'canonical' => route('blog.detail', ['article' => $article->slug])
            ]);
        } else {
            return abort(503);
        }
    }

    public function portfolios()
    {
        $categoriesId = DB::table('categorizables')->where('categorizable_type', 'portfolio')->pluck('category_id')->toArray();
        $categories = Category::query()->where('status', true)->whereIn('id', $categoriesId)->get();
        $portfolios = Portfolio::query()
            ->orderByDesc('id')
            ->where('status', true)
            ->get();


        return view('controllers.client.portfolios', [
            'categories' => $categories,
            'portfolios' => $portfolios,
            'canonical' => route('portfolio')
        ]);

    }

    public function portfolio(Portfolio $portfolio)
    {
        if ($portfolio->published()) {
            return view('controllers.client.portfolio', [
                'portfolio' => $portfolio,
                'title' => $portfolio->title,
                'meta' => $portfolio->meta_desc,
                'canonical' => route('portfolio.detail', ['portfolio' => $portfolio->slug])
            ]);
        } else {
            return abort(503);
        }
    }
}
