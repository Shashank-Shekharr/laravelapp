<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    //
    public function index(){
        //
        $androidAdmob = json_decode(setting("android_admob",""));
        $iosAdmob = json_decode(setting("ios_admob",""));
        return response()->json([
            "ad" => [
                "android" => $androidAdmob ?? [
                    "app_id" => "ca-app-pub-6822244222970163~3836273235",
                    "banner_ad_id" => "ca-app-pub-6822244222970163/6454504191",
                    "interstitial_ad_id" => null,
                    "ad_enable" => "1",
                ],
                "ios" => $iosAdmob ?? [
                    "app_id" => "ca-app-pub-6822244222970163~4211484238",
                    "banner_ad_id" => "ca-app-pub-6822244222970163/3453129854",
                    "interstitial_ad_id" => null,
                    "ad_enable" => "1",
                ],
            ],
        ], 200);
    }
}
