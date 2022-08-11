<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\PushNotification;
use Facade\FlareClient\Http\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use Illuminate\Support\Facades\Http;

class PushNotificationController extends BaseController
{


    public function indexByid($user_id)
    {
        $datas = PushNotification::where('user_id', $user_id)->latest()->get();

        return $this->sendResponse($datas, 'Data fetched');
    }

    public function deleteAll()
    {
        $datas = PushNotification::truncate();

        return $this->sendResponse($datas, 'Data fetched');
    }

    public function tesApi()
    {
        $user_id = 5;
        $url = "https://fcm.googleapis.com/fcm/send";
        $SERVER_API_KEY = 'AAAASSWA7hI:APA91bGkfIJFNGyqIJAiKtLXI79XdZpDuicn7pQrFv-yXdbLmLQETRkRkCY5VnGZBfwRevDkUJdA0ADnJ7Z5r1rnS4flS-ds8yxe_bp4sXouzH8Nfj-PHYCGl8-pVKkE49WqsSuPkKtd';
        $headers = [
            'Authorization' => 'key=' . $SERVER_API_KEY,
            'Content-Type' => 'application/json',
        ];
        $response = Http::withHeaders($headers)->post($url, [
            // "to" => "cWmdLu_QQqa6CR28k2aDtJ:APA91bHs2-K9fkZ7rOIUOvrq2bEtlxNpTUoZSn7-TpOcNpfmbwFRfhY1NPBCjYv53uCHJLfFPmsmG84pSWXmG2ezDVkv-opbrM-AaQ42j_UKso-qAqGWlMoJv0AhffI2NAaKTv9DIe0v",
            // 'to' => '/topics/all',
            'to' => '/topics/topic_user_id_' . $user_id,
            "notification" => [
                "title" => "Pembayaran Berhasil",
                "body" => "Rich Notification testing (body)",
                "mutable_content" => true,
                "sound" => "Tri-tone",
                "imageUrl" => "http://192.168.43.123:8000/img/no-image.png"
            ]
        ]);

        return $response;
    }
}
