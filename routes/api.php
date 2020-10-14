<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->group(function(){
    //　ここは全て「sanctum」のミドルウェアが適用される
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    
    Route::get('entrose/quiz/kure', 'QuizController@kure');
    Route::options('entrose/quiz/kure', function () {
        return response()->json();
    });
    Route::post('entrose/rantaku', 'EntrosesController@rantaku');
    Route::options('entrose/rantaku', function () {
        return response()->json();
    });
});

Route::middleware(['cors'])->group(function () {
//    Route::options('entrose/rantaku', function () {
//        return response()->json();
//    });
  
    Route::options('family_explain', function () {
        return response()->json();
    });
  
//    Route::options('entrose/quiz/kure', function () {
//        return response()->json();
//    });

//    Route::post('entrose/rantaku', 'EntrosesController@rantaku');
  
    Route::get('family_explain', 'FamilyExplainController@index');
    
//    Route::get('entrose/quiz/kure', 'QuizController@kure');

});

Route::post('/login', function(Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|alpha-num|min:8'
    ]);
    if(auth()->attempt($credentials)) {
        return ['result' => true];
    }
    return response(['message' => 'ユーザーが見つかりません。'], 422);
});

//Route::middleware(['guest'])->group(function () {
//    Route::post('/register', 'Auth\RegisterController@register');
//});
Route::post('/register', 'Auth\RegisterController@register');

// Password Reset Routes.
//Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

