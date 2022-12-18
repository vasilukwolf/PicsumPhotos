<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ImageGeneratorController extends Controller
{
    public function __invoke(){
        $imgID = mt_rand(1,1029);
        return view('index',['imgID'=>$imgID]);
    }
    public function getImageJSON(){
        $imgID = mt_rand(1,1029);
        $url = 'https://picsum.photos/id/'.$imgID.'/600/500';
        return response()->json(['UrlPicsum' => $url, 'PicsumID' =>$imgID]);
    }
}
