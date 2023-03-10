<?php

namespace App\Http\Livewire\Client\Messages;

use App\Actions\MessageAction;
use App\Http\Livewire\Client\BaseClientComponent;
use App\Http\Requests\Messages\MessageRequest;
use Faker\Provider\Base;
use Livewire\Component;

class CreateMessage extends BaseClientComponent
{
  public $name;
  public $title;
  public $desc;


    public function save()
    {
        $socialAction = new MessageAction();
        $request = $this->validateBase((new MessageRequest()));
        $socialAction->store($request);
        $this->reset(['name', 'title', 'desc']);
        $this->alertBase('success', 'پیام با موفقیت ارسال شد.', 'bottom-end');
        $this->emit('refresh');
    }



    public function render()
    {
        return view('livewire.client.messages.create-message');
    }
}
