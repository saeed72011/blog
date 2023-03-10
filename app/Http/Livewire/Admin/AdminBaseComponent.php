<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AdminBaseComponent extends ModalComponent
{
    use LivewireAlert, WithFileUploads;

    public $idModel;
    public $model;
    public $itemModel;
    public $fileName;
    public $routeName;

    protected $listeners = [];

    public function viewBase($path, $param = [])
    {
        return view('livewire.admin.' . $path, $param)
            ->extends('layouts.admin.app')
            ->section('content');
    }

    public function alertBase(
        $type = 'success',
        $message = 'ذخیره شد',
        $position = 'top-end',
        $toast = true,
        $timer = 5000

    )
    {
        $this->alert($type, $message, [
            'position' => $position,
            'toast' => $toast,
            'timer' => $timer,
            'timerProgressBar' => true
        ]);
    }

    public function tryBase(callable $result)
    {
        DB::beginTransaction();
        try {
            $model =  $result();
            DB::commit();
            $this->alertBase();
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->alertBase('error', 'خطای پایگاه داده!');
            return $model = null;
        }
        return $model;
    }

    public function uploadBase($UploadFile, $folderName, $modelFile = null)
    {
        if ($UploadFile) {
            if ($modelFile) Storage::disk('public')->delete($modelFile);
            return $UploadFile->storePublicly($folderName, 'public');
        } else {
            return $modelFile;
        }
    }

    public function deleteFile($class, $id, $fileName)
    {
        $this->idModel = $id;
        $this->model = $class;
        $this->fileName = $fileName;
        $this->confirm('حذف شود؟', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroyFile',
            'showCancelButton' => true,
            'cancelButtonText' => 'خیر',
            'confirmButtonText' => 'بله',
        ]);

    }

    public function destroyFile()
    {
        $this->setModel();
        if ($this->itemModel->{$this->fileName}) {
            Storage::disk('public')->delete($this->itemModel->{$this->fileName});
            $this->itemModel->update([
                $this->fileName => null
            ]);
            $this->alert('warning', 'حذف شد.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            $this->emit('refresh');
        }
    }

    public function delete($idModel = null, $model = null, $routeNameForRedirect = null)
    {
        $this->idModel = $idModel;
        $this->model = $model;
        $this->routeName = $routeNameForRedirect;

        $this->confirm('حذف شود؟', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'cancelButtonText' => 'خیر',
            'confirmButtonText' => 'بله',
        ]);
    }

    public function destroy()
    {
        $this->setModel();
        $this->itemModel->delete();
        $this->alert('warning', 'حذف شد.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
        redirect()->route($this->routeName);
    }

    public function setModel()
    {
        $root = '/App/Models/'.$this->model;
        $this->itemModel = str_replace('/', '\\', $root)::find($this->idModel);

    }

    public function validateBase(FormRequest $request): array
    {
        return $this->validate($request->rules(), $request->messages(), $request->attributes());
    }
}
