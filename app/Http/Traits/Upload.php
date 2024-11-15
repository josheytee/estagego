<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait Upload
{
    public function uploadImage(Request $request, $disk, $imageName)
    {

        $imagePath = "";
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            if ($profileImage->isValid()) {
                $ext = $profileImage->getClientOriginalExtension();
                // $imageName = \Str::slug($expert->title) . '_' . \Str::slug($expert->name);
                $pictureNameToSave = $imageName . '.' . $ext;
                $imagePath .= $profileImage->storeAs('', $pictureNameToSave, $disk);
                return $imagePath;
            }
        }
    }
}
