<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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


function sendFCMNotification($title, $message , $tokens , $send_from , $send_to)
{

    $serverKey =  env('SERVER_KEY', 'AAAA4Ocayz4:APA91bEuiUfWgH2YQyUQylCUlEpEMXxQ8_-3yAf1qWXewhemmP2OoGNtmAIN7qm-OJ--hgK77k1xNAfHDLsTyjTKWCdtPdk-YQf1Y60JiwoFmU9pyS_gs0CVs_dI8biZJm8SzDKOAH21');

    $tokens = array_chunk($tokens, 1000);

    foreach ($tokens as $token) {

        $data = [
            "registration_ids" => $token ,
            "notification"  => [
                "title"     => $title,
                "body"      => $message,
                "send_from" => $send_from ,
                "send_to"   =>   $send_to ,
                "priority"  =>  "normal" ,
                'sound'=>  'default',
                'badge'=>  '1',
            ],


            "data"=> [
                "id" => '1',
                "click_action" => 'FLUTTER_NOTIFICATION_CLICK',
                "contentTitle"=> $title,
                "summaryText"=>$message,
            ]

        ];


        $encodedData = json_encode($data);
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);


    }
}





