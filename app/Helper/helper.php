<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;







function addImage(Request $request, array & $data, $imageFieldName , $storagePath )
{
    if ($request->hasFile($imageFieldName)) {
        $imagePath = $request->file($imageFieldName)->store($storagePath);
        $data[$imageFieldName] = $imagePath;
    }

}

function updateImg(Request $request, array &$data, $imageFieldName, $storagePath , $admin)
{
    if ($request->hasFile($imageFieldName)) {
        Storage::delete($admin->$imageFieldName); // Delete previous image
        $data[$imageFieldName] = $request->file($imageFieldName)->store($storagePath);
    } else {
        $data[$imageFieldName] = $admin->$imageFieldName;
    }
}
