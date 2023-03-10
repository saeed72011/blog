<?php

namespace App\Http\Controllers;

use App\Actions\ArticleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ArticleController extends Controller
{

    public function create()
    {
        return view($this->path_controllers_admin . 'articles.create');
    }

    public function store(StoreArticleRequest $request, ArticleAction $action): \Illuminate\Http\RedirectResponse
    {
        $action->store($request);
        alert()->success('ذخیره', 'با موفقیت انجام شد.');
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {

        return view($this->path_controllers_admin . 'articles.edit', compact( 'article'));
    }


    public function update(Article $article, Request $request, ArticleAction $action): \Illuminate\Http\RedirectResponse
    {
        $updateArticleRequest = new UpdateArticleRequest($article);
        $request->validate($updateArticleRequest->rules());
        $action->update($request, $article);
        alert()->success('ویرایش', 'با موفقیت انجام شد.');
        return redirect()->route('articles.edit', ['article' => $article]);
    }
}
