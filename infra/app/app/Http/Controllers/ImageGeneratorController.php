<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\ImageSorter;
use TheSeer\Tokenizer\Token;

class ImageGeneratorController extends Controller
{
    public function __invoke(){
        $imgID = mt_rand(1,1029);
        foreach (ImageSorter::all() as $image) {
            if($image->img_id == $imgID){
                $imgID = mt_rand(1,1029);
                return view('index',['imgID'=>$imgID]);
            }
        }
        return view('index',['imgID'=>$imgID]);
    }
    public function getImageJSON(){
        $imgID = mt_rand(1,1029);
        $url = 'https://picsum.photos/id/'.$imgID.'/600/500';
        return response()->json(['UrlPicsum' => $url, 'PicsumID' =>$imgID]);
    }

    public function store(Request $request){
        $validatedData = $request->validate(
            [
              'img_id'=>'required',
              'status'=> 'required',
            ]
        );
        $imageSorter = new ImageSorter();
        $imageSorter->img_id = $request->img_id;
        $imageSorter->status = $request->status;

        $imageSorter->save();
        return redirect('/')->with('status','Вы проголосовали за изображение');

    }

    public function admin($key){
        $token = '9ac051793bd31855bb6d377cdc9357228f032626a79920dd1da7a6ed8b4211cf';
        $imageSorter = ImageSorter::all();
        if($key === $token) {
            return view('admin', ['imageSorter' => $imageSorter]);
        }
    }


    public function reset($id)
    {
        ImageSorter::destroy($id);
        return redirect('admin/9ac051793bd31855bb6d377cdc9357228f032626a79920dd1da7a6ed8b4211cf');
    }

}
