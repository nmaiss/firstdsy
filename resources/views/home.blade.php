<head>
    <style>
        body{
            background-color: white;
        }

        .container{
            text-align: center!important;
        }

        .logo-site img{
            height: 230px;
            margin-bottom: 120px;
            box-shadow: 5px 5px 5px grey;
        }

        .armoirie img{
            height: 130px;
            margin-top: 50px;
            margin-bottom: 80px;
        }

        .database-link{
            font-size: 1.5em;
            background-color: #FBE4D4;
            padding-top: 60px;
            padding-bottom: 60px;
            color: #F4B081;
            font-weight: bold;
            border-radius: 20px!important;
        }

        .logout-button img{
            height: 120px;
        }

        .logout-button{
            position: absolute;
            right: 50;
            top: 0;
            top: 320px;
        }

        .database-link{
            text-decoration: none!important;
            color: white;
        }

        .db-link{
            background-color: #009999!important;
            border: 2px #009999 solid!important;
        }

        .r-link{
            background-color: #FF7C80!important;
            border: 2px #FF7C80 solid!important;
        }

        .geeks {
            width: 500px;
            height: 2px;
            background: #fff;
            position: absolute;
            top: 380px;
            left: 50%;
            transform: translate(-50%, -50%);
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
    <div class="geeks"></div>
    <div class="row">
      <div class="col armoirie">
        <img src="{{ URL::to('/assets/img/ArmoiriesRCA.png') }}">
      </div>
      <div class="w-100"></div>
      <div class="col logo-site">
          <img src="{{ URL::to('/assets/img/logo.jpg') }}">
      </div>
      <div class="w-100"></div>
      <div class="col">
          <a href="/database">
              <div class="database-link db-link">
                BASE DE DONNÉES
              </div>
          </a>
      </div>
      <div class="col">
          <a href="/recensement">
              <div class="database-link r-link">
                DÉCLARATIONS
              </div>
          </a>
      </div>
    </div>
  </div>
</div>
@endsection
