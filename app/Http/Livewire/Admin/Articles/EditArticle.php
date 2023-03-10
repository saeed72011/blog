<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Actions\ArticleAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class EditArticle extends AdminBaseComponent
{

    protected $listeners = [
        'refresh' => '$refresh',
        'descValue', 'destroy', 'cancelled', 'destroyFile',
    ];

    public $article;
    public $user_id;
    public $category_id;
    public $title;
    public $desc;
    public $author;
    public $view;
    public $study_time;
    public $status;
    public $image;
    public $video;
    public $slug;
    public $meta_title;
    public $meta_desc;

    public function descValue($desc)
    {
        $this->desc = $desc;
        $this->save();
    }

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->user_id = $article->user_id;
        $this->category_id = $article->category_id;
        $this->title = $article->title;
        $this->author = $article->author;
        $this->study_time = $article->study_time;
        $this->status = $article->status;
        $this->slug = $article->slug;
        $this->meta_title = $article->meta_title;
        $this->meta_desc = $article->meta_desc;
    }

    public function save()
    {
        $articleAction = new ArticleAction;
        $request = $this->validateBase((new UpdateArticleRequest()));
        $this->tryBase(fn() => $articleAction->update($request, $this->article));
        $this->emitTo('admin.articles.table-article', 'refresh');
    }


    public function render()
    {
        $users = User::query()->pluck('name', 'id')->toArray();
        $categories = Category::query()->pluck('title', 'id')->toArray();
        return $this->viewBase('articles.edit-article', ['users' => $users, 'categories' => $categories]);
    }
}
