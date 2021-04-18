<head>
    <style>
    .database-link{
        font-size: 1.5em;
        background-color: #F4B081;
        padding-top: 40px;
        padding-bottom: 40px;
        color: #C55A11;
        font-weight: bold;
        border: 4px #C55A11 solid!important;
        border-radius: 20px!important;
        text-align: center;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 50px;
    }

    .divider-horizontal{
        margin-top: 80px;
        font-weight: bold;
        border: 1px solid #D8D8D8
    }

    .hrlignes{
        position: relative;
        margin-bottom: 70px;
    }

    .armoirie{
        position: absolute;
        left: 70;
    }

    .logout{
        position: absolute;
        right: 70;
    }

    .armoirie img{
        height: 100px;
        transform: translateY(-50%);
    }

    .logout img{
        height: 100px;
        transform: translateY(-70%);
    }

    .table-agents{
        margin-left: 10%;
        margin-right: 10%;
    }

    </style>
</head>

@extends('layouts.app')

@section('content')

<a href="/recensement">
    <div class="database-link">
      RECENSEMENTS
    </div>
</a>

<div class="hrlignes">
    <div class="armoirie">
        <a href="/">
            <img src="{{ URL::to('/assets/img/ArmoiriesRCA.png') }}">
        </a>
    </div>
    <hr class="divider-horizontal">
    <div class="logout">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <img src="{{ URL::to('/assets/img/Deconnexion.png') }}">
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<div id="app">
    <table-component class="table-agents" :agents="{{ $agents }}" class="mb-6"></table-component>
</div>

@endsection

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
