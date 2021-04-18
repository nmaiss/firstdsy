<head>
    <style>
        body{
            background-color: white;
        }

        .container{
            text-align: center!important;
        }

        .logo-site img{
            height: 150px;
            margin-bottom: 80px;
        }

        .armoirie img{
            height: 400px;
            margin-bottom: 50px;
        }

        .database-link{
            font-size: 1.5em;
            background-color: #FBE4D4;
            padding-top: 60px;
            padding-bottom: 60px;
            color: #F4B081;
            font-weight: bold;
            border: 2px #F6C3A0 solid!important;
            border-radius: 20px!important;
        }

        .logout-button img{
            height: 120px;
        }

        .logout-button{
            position: absolute;
            right: 50;
            top: 0;
            top: 50%;
            transform: translateY(-60%);
        }

        .database-link{
            text-decoration: none!important;
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
<div class="logout-button">
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <img src="{{ URL::to('/assets/img/Deconnexion.png') }}">
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<div class="container">
    <div class="row">
      <div class="col logo-site">
          <img src="{{ URL::to('/assets/img/logo.jpg') }}">
      </div>
      <div class="w-100"></div>
      <div class="col armoirie">
        <img src="{{ URL::to('/assets/img/ArmoiriesRCA.png') }}">
      </div>
      <div class="w-100"></div>
      <div class="col">
          <a href="/database">
              <div class="database-link">
                BASE DE DONNÉES
              </div>
          </a>
      </div>
      <div class="col">
          <a href="/recensement">
              <div class="database-link">
                RECENSEMENT
              </div>
          </a>
      </div>
    </div>
  </div>
</div>
@endsection
