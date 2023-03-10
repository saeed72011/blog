<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DescSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapXmlController;
use App\Http\Livewire\Admin\Articles\IndexArticle;
use App\Http\Livewire\Admin\Auth\LoginIndex;
use App\Http\Livewire\Admin\Categories\IndexCategory;
use App\Http\Livewire\Admin\Comments\IndexComment;
use App\Http\Livewire\Admin\Images\IndexImage;
use App\Http\Livewire\Admin\IndexDashboard;
use App\Http\Livewire\Admin\Messages\IndexMessage;
use App\Http\Livewire\Admin\Portfolios\IndexPortfolio;
use App\Http\Livewire\Admin\Sliders\IndexSlider;
use App\Http\Livewire\Admin\Socials\IndexSocial;
use App\Http\Livewire\Admin\Teams\IndexTeam;
use App\Http\Livewire\Admin\Users\IndexUser;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);

//Route For Auth
Route::get('/admin/login', LoginIndex::class)->name('login');
Route::get('/admin/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', IndexDashboard::class)->name('dashboard');
    Route::put('dashboard/setting/desc/update', [DescSettingController::class, 'update'])->name('setting.desc.update');

    Route::get('users', IndexUser::class)->name('users.index');
    Route::get('categories', IndexCategory::class)->name('categories.index');
    Route::get('socials', IndexSocial::class)->name('socials.index');
    Route::get('sliders', IndexSlider::class)->name('sliders.index');
    Route::get('images', IndexImage::class)->name('images.index');
    Route::get('messages', IndexMessage::class)->name('messages.index');
    Route::get('portfolios', IndexPortfolio::class)->name('portfolios.index');
    Route::get('teams', IndexTeam::class)->name('teams.index');


    //article
    Route::get('articles', IndexArticle::class)->name('articles.index');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');

    Route::get('comments/index', IndexComment::class)->middleware(['auth', 'verified'])->name('comments.index');
    Route::post('ckeditor/upload', [Controller::class, 'upload'])->name('ckeditor.upload');
});




Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog', [HomeController::class, 'articles'])->name('blog');
Route::get('/blog/{article}', [HomeController::class, 'article'])->name('blog.detail');
Route::get('/portfolio', [HomeController::class, 'portfolios'])->name('portfolio');
Route::get('/portfolio/{portfolio}', [HomeController::class, 'portfolio'])->name('portfolio.detail');




