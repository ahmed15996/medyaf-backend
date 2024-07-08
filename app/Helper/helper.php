<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;







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


function orderById(Request $request , $data ){
    if ($request->has('order_by')) {
        if ($request->order_by == 'desc') {
            $data->orderBy('id', 'desc');
        } elseif ($request->order_by == 'asc') {
            $data->orderBy('id', 'asc');
        }
    }
}

