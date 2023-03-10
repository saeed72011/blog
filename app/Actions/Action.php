<?php


namespace App\Actions;


use Illuminate\Support\Facades\Storage;

class Action
{
    public function uploadBase($UploadFile, $folderName, $modelFile = null)
    {
//        dd([$UploadFile, $folderName, $modelFile]);
        if ($UploadFile) {
            if ($modelFile) Storage::disk('public')->delete($modelFile);
            return $UploadFile->storePublicly($folderName, 'public');
        } else {
            return $modelFile;
        }
    }
}
