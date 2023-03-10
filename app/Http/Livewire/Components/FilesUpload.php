<?php

namespace App\Http\Livewire\Components;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class FilesUpload extends BaseFileComponent
{
    use WithFileUploads;

    public $photos = [];
    public $alts;
    public $modelName;
    public $modelId;


    protected $listeners = [
        'refresh' => '$refresh'
        , 'destroyFile', 'canceledFile'
    ];


    public function mount($modelId, $modelName)
    {
        $this->modelId = $modelId;
        $this->modelName = $modelName;
        $this->alts = Photo::query()->where('photoable_id', $this->modelId)->where('photoable_type', $this->modelName)
            ->pluck('alt', 'id')->toArray();
    }

    public function addCheckAll()
    {
        $this->checkPics = Photo::query()->where('photoable_id', $this->modelId)->where('photoable_type', $this->modelName)->pluck('photo', 'id')->toArray();
    }

    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        foreach ($this->photos as $photo) {
            Photo::query()->create([
                'photo' => $photo->storePublicly($this->modelName, 'public'),
                'photoable_id' => $this->modelId,
                'photoable_type' => $this->modelName,
            ]);
        }
        $this->emitSelf('refresh');
        $this->reset('photos');
        $this->alert('success', 'عکس ها با موفقیت ذخیره شد.');
    }

    public function updatedAlts($value, $id)
    {
        $this->validate([
            'alts.' . $id => 'required|string|max:255',
        ]);

        Photo::query()->find($id)->update([
            'alt' => $value
        ]);
        $this->alert('success', 'ذخیره شد.');
        $this->emitSelf('refresh');
    }

    public function render()
    {
        $images = Photo::query()->where('photoable_id', $this->modelId)->where('photoable_type', $this->modelName)->get();
        return view('livewire.components.files-upload', compact('images'))
            ->extends('layouts.app')
            ->section('content');
    }
}
