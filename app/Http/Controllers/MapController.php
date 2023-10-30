<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function mapss(Request $request)
    {
//        Map::created($request);
//        $data = json_encode(["points"=>[$request->first_lat,$request->first_long],[$request->second_lat,$request->second_long]]);
//        $url = "https://graphhopper.com/api/1/route?key=08001007-b813-460d-bed2-d059fe9792a5";
//        $result= file_get_contents($url,false,stream_context_create([
//            'http' => [
//                'method'=>'Post',
//                'header' =>'Content_Type: application/json',
//                'content' =>$data
//        ]
//        ]));
//        return response(json_decode($result,true));
//    }


        $data = json_encode(["points" => [[$request->first_lat, $request->first_long], [$request->second_lat, $request->second_long]]]);
        $url = 'https://graphhopper.com/api/1/route?key=08001007-b813-460d-bed2-d059fe9792a5';
        $result = file_get_contents($url, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => $data
            ]
        ]));
        $change = json_decode($result, true);

//        $distance = $change['paths'][0]['distance'];
//        $tim=$change['paths'][0]['tim'];
//        dd($change);
//        if ($distance<5){
//            $tim
//        }
        return response(json_decode($result, true));

    }

}

