<?php


namespace App\Actions;


use App\Models\Article;
use App\Models\Comment;

class CommentAction extends Action
{

    public function store($request, $commentable_id, $commentable_type): Comment
    {

        return Comment::create([
            'commentable_id' => $commentable_id,
            'commentable_type' => $commentable_type,
            'name' => $request['name'],
            'status' => auth()->check() ? true : false,
            'desc' => $request['desc'],
        ]);
    }


    public function update($request, Comment $comment): Comment
    {
        $comment->update([
            'status' => $request['status'],
        ]);

        return $comment;
    }
}
