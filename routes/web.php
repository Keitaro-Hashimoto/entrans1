<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('entrose/rantaku', 'EntrosesController@rantaku');
//
//Route::post('entrose/rantaku', 'EntrosesController@rantaku');
//
//Route::get('family_explain', 'FamilyExplainController@index');
//
//Route::get('entrose/quiz/kure', 'QuizController@kure');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/create_token', function(){
//    $permissions = ['user:update']; // 権限
//    $user = \App\User::find(1);
//    $token = $user->createToken('my-api-token', $permissions);
//    echo $token->plainTextToken;    // トークンを表示
//});

//Route::get('/mail', 'MailSendController@index');

