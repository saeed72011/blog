<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Actions\ArticleAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Models\Category;
use App\Models\User;

class CreateArticle extends AdminBaseComponent
{
    public $user_id = '';
    public $category_id = '';
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

    protected $listeners = [
        'refresh' => '$refresh',
        'getCateId', 'descValue'
//        'destroy', 'cancelled'
    ];

    public function descValue($desc)
    {
        $this->desc = $desc;
        $this->save();
    }

    public function save()
    {
        $articleAction = new ArticleAction;
        $request = $this->validateBase((new StoreArticleRequest()));
        $this->tryBase(fn() => $articleAction->store($request));
        $this->reset([
            'user_id',
            'category_id',
            'title',
            'desc',
            'author',
            'study_time',
            'status',
            'image',
            'video',
            'slug',
            'meta_title',
            'meta_desc',
        ]);
        $this->redirect(route('articles.index'));
        $this->emitTo('admin.articles.table-article', 'refresh');
    }

    public function render()
    {
        $users = User::query()->pluck('name', 'id')->toArray();
        $categories = Category::query()->pluck('title', 'id')->toArray();
        return $this->viewBase('articles.create-article', ['users' => $users, 'categories' => $categories]);
    }
}
