<?php


namespace App\Http\Livewire\Components;


use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class BaseFileComponent extends Component
{
    use LivewireAlert;
    public $checkPics = [];

    public function subCheckAll()
    {
        $this->checkPics = [];
    }

    public function deleteFile()
    {
        $this->confirm('عکس های انتخاب شده حذف شوند؟', [
            'position' => 'center',
            'timer' => false,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroyFile',
            'onDismissed' => 'canceledFile',
            'showCancelButton' => true,
            'cancelButtonText' => 'خیر',
            'confirmButtonText' => 'بله',
        ]);


    }

    public function destroyFile()
    {
        foreach (array_filter($this->checkPics) as $id => $path) {
            $pic = Photo::query()->find($id);
            $pic->delete();
            Storage::disk('public')->delete($path);
        }
        $this->checkPics = [];
        $this->alert('warning', 'حذف شدند.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
        $this->emitSelf('refresh');
    }

    public function canceledFile()
    {
        $this->alert('info', 'هیج عکسی حذف نشده است.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
        $this->emitSelf('refresh');
    }

}
