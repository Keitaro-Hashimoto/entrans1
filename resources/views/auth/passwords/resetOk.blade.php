@extends('layouts.roseapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ __('パスワード再設定手続き：完了しました') }}</h2>

                <div class="card-body">



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('あなたのID(Email)') }}</label>

                            <div class="col-md-6">
                               <h3>{{ $email }}</h3>
                            </div>
                        </div>
                        <strong>{{ __('新しいパスワードをお控えください') }}</strong><br><br>
                      <strong>{{ __('このページを閉じて、『バラの入口』アプリにて新しいパスワードでログインしてください') }}</strong><br><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="http://localhost:8081/"><button  class="btn btn-primary">
                                    {{ __('ページを閉じる') }}
                              </button></a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
