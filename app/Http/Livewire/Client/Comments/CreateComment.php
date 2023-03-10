<?php

namespace App\Http\Livewire\Client\Comments;

use App\Actions\CommentAction;
use App\Http\Livewire\Client\BaseClientComponent;
use App\Http\Requests\Comments\StoreCommentRequest;
use App\Models\Article;

class CreateComment extends BaseClientComponent
{
    public $commentable_id;
    public $commentable_type;
    public $name;
    public $desc;

    public function mount($commentableId, $commentableType)
    {
        $this->commentable_id = $commentableId;
        $this->commentable_type = $commentableType;
    }


    public function save(CommentAction $action)
    {
        $request = $this->validateBase((new StoreCommentRequest()));
        $action->store($request, $this->commentable_id, $this->commentable_type);
        $this->reset(['name', 'desc']);
        $this->alertBase('success', 'بعد از تایید نظر شما نمایش داده می شود', 'center', false);
    }


    public function render()
    {
       return view('livewire.client.comments.create-comment');
    }
}
