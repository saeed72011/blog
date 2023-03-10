<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public string $path_controllers_admin = 'controllers.admin.';

    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {
        $path_url = 'storage';
        if ($request->hasFile('upload')) {
            $photo = $request->file('upload')->storePublicly('ckeditor', 'public');
             Image::create([
                'image' => $photo,
            ]);
            $url = asset($path_url . '/' . $photo);
        } else  {
            $url = '';
        }
        return response()->json(['fileName' => $request->file('upload')->getClientOriginalName(), 'uploaded'=> 1, 'url' => $url]);

    }
}
