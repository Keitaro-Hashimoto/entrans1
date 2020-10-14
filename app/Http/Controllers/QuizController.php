<?php

namespace App\Http\Controllers;

use App\QuizChisiki;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function kure(Request $request){
      $level = $request->level;
      dd($level);
      $items = QuizChisiki::where('Level', $level)->get();
      dd($items);
      $json = $items->toJson();
//      dd($json);
      return $json;
    }
}
