<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    public function register(Request $request)
    {
        $data = $request->all();
        $messages = [
          'name.required' => 'ユーザー名(ニックネームで可)は必ずご入力ください',
          'name.string' => 'ユーザー名は文字列でご入力ください',
          'email.required' => 'メールアドレスは必ずご入力ください',
          'email.email' => 'メールアドレスをご入力ください',
          'email.unique' => 'このメールアドレスは既にご登録ございます',
          'password.required' => 'パスワードは必ずご入力ください',
          'password.alpha-num' => 'パスワードは英数にてご入力ください',
          'password.min' => 'パスワードは8文字以上の英数でご入力ください',
          'password.confirmed' => '確認用パスワードと一致しませんでした',
        ];
        $validator = Validator::make($data,
          [ 'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha-num|min:8|confirmed',
          ],$messages);
        if($validator->fails()){
          $error = $validator->messages()->toJson();
          return $error;
        }else{
          $this->create($data);
          return ['registerResult' => true];
        }
        /*
        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
                        */
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return 
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
