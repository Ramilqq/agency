<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\API\Yandex\AdsApiController;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function show(int $id, int $gid) {

        $ads = new AdsApiController;
        $ads = $ads->getAds($id, $gid);

        //dd($ads);

        return view('web.main', [
            'data' => [
                [
                    'method' => 'GetAdsRequest',
                    'values' => $ads,
                    'params' => [
                        'id' => $id,
                        'gid' => $gid,
                    ]
                ]
                    ],
            'report' => []
        ]);
    }
}
