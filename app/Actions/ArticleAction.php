<?php


namespace App\Actions;


use App\Models\Article;

class ArticleAction extends Action
{

    public function store($request): Article
    {
        return Article::create([
            'title' => $request['title'] ,
            'desc' => $request['desc'] ,
            'author' => $request['author'] ,
            'study_time' => $request['study_time'] ,
            'status' => $request['status'] ,
            'image' => $this->uploadBase($request['image'], 'articles'),
            'video' => $this->uploadBase($request['video'], 'articles'),
            'slug' => $request['slug'],
            'meta_title' => $request['meta_title'] ,
            'meta_desc' => $request['meta_desc'] ,
        ]);
    }


    public function update($request, Article $article): Article
    {
        $article->update([
            'title' => $request['title'] ,
            'desc' => $request['desc'] ,
            'author' => $request['author'] ,
            'study_time' => $request['study_time'] ,
            'status' => $request['status'],
            'image' => $this->uploadBase($request['image'], 'articles', $article->image),
            'video' => $this->uploadBase($request['video'], 'articles', $article->video),
            'meta_title' => $request['meta_title'] ,
            'meta_desc' => $request['meta_desc'] ,
            'slug' => $request['slug'],
        ]);
        return $article;
    }
}
