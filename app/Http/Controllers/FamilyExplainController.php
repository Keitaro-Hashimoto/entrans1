<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FamilyExplainController extends Controller
{
    public function index()
    {
      $items = DB::table('family_explain')->get();
      return response()->json(['data' => $items]);
    }
}
