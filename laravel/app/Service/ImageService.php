<?php

namespace App\Service;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageService
{
    public function Make($request,$name,$directory = "users")
    {
        if (!$request->has($name)) return null;

        $this->deleteIfImageAlreadyExists($request);

        $image = $request->file($name);

        $randomName = Str::slug(Str::random("7")). '.'.$image->extension();

        $image->move(public_path("assets/$directory"),$randomName);

        return $randomName;
    }


    private function deleteIfImageAlreadyExists()
    {
        $user = auth()->user();
        if (File::exists(public_path("assets/users/".$user->image))){
            File::delete(public_path("assets/users/".$user->image));
        }

        return TRUE;
    }
}
