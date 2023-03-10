<?php

namespace App\Http\Livewire\Admin\Images;

use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class IndexImage extends AdminBaseComponent
{
    protected $listeners = [
        'refresh' => '$refresh',
        'destroyFile',
        ];

    public $images;

    public function destroyFile()
    {
        $this->setModel();
        if ($this->itemModel->{$this->fileName}) {
            Storage::disk('public')->delete($this->itemModel->{$this->fileName});
            $this->itemModel->delete();
            $this->alert('warning', 'حذف شد.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            $this->emit('refresh');
        }
    }

    public function mount()
    {
        $this->images = Image::all();
    }

    public function render()
    {
        return $this->viewBase('images.index-image');
    }
}
