<?php

namespace App\Http\Controllers;

use App\Entrose;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrosesController extends Controller
{
    public function rantaku(Request $request){
      $keepArr = $request->all();
//      dd($keepArr);
      $items = Entrose::whereNotIn('F_id', $keepArr)->inRandomOrder()->take(12)->get();
//      dd($items);
//      $picNames = $items->pluck('image_name');
//      dd($picNames);
//      $picName1 = $picNames[0];
//      $img = Storage::disk('public')->get('rosePic/'. $picName1);
//      $imgStr = base64_encode($img);
//      dd($imgStr);
      $json = $items->setAppends(['image_str'])->toJson();
//      dd($json);
      return $json;
    }
}
