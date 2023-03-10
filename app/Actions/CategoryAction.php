<?php


namespace App\Actions;


use App\Models\Category;


class CategoryAction extends Action
{
    public function store($request): Category
    {
        return Category::create([
            'title' => $request['title'],
            'status' => $request['status'],
            'slug' => $request['slug'],
            'desc' => $request['desc'],
            'image' => $this->uploadBase($request['image'], 'categories'),
            'meta_title' => $request['meta_title'],
            'meta_desc' => $request['meta_desc'],
        ]);
    }


    public function update($request, Category $category): Category
    {
        $category->update([
            'title' => $request['title'],
            'status' => $request['status'],
//            'slug' => $request['slug'],
            'desc' => $request['desc'],
            'image' => $this->uploadBase($request['image'], 'categories', $category->image),
            'meta_title' => $request['meta_title'],
            'meta_desc' => $request['meta_desc'],
        ]);
        return $category;
    }

}
