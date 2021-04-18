<head>
    <style>
        body{
            background-color: white!important;
        }

        .field-title{
            color: #F4B081;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .login-field{
            height: 100px!important;
            font-size: 2em!important;
            text-align: center!important;
            background-color: #FBE4D4!important;
            border: 2px #F6C3A0 solid!important;
            border-radius: 20px!important;
        }

        .submit-login{
            text-align: center;
            margin-top: 50px!important;
        }

        .divider-fields{
            margin-bottom: 80px;
        }

        .submit-image{
            height: 200px;
        }

        .login-form{
            margin-top: 100px;
        }

    </style>
</head>

@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container login-form">
        <div class="row">
            <div class="col field-title">IDENTIFIANT</div>
            <div class="col field-title">MOT DE PASSE</div>
            <div class="w-100"></div>
            <div class="col">
                <input id="email" type="text" class="login-field form-control @error('id') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="col">
                <input id="password" type="password" class="login-field form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <div class="form-group submit-login">
                    <hr class="divider-fields">
                    <input class="submit-image" type="image" src="{{ URL::to('/assets/img/Play.png') }}"></input>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
