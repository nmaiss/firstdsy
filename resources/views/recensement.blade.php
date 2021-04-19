<style>

    .database-link{
        font-size: 1.5em;
        background-color: #009999;
        padding-top: 40px;
        padding-bottom: 40px;
        color: white;
        font-weight: bold;
        border: 4px #009999 solid!important;
        border-radius: 20px!important;
        text-align: center;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 50px;
    }

    .table-data{
        margin-left: 1%;
        margin-right: 1%;
        margin-top: 80px;
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

    .table thead th{
        background-color: #FEEDEC!important;
        color: #FF5050!important;
    }

    .geeks {
        width: 500px;
        height: 2px;
        background: #fff;
        margin-top: 50px;
        margin-left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

@extends('layouts.app')

@section('content')
    <a href="/database">
        <div class="database-link">
          BASE DE DONNÉES
        </div>
    </a>
    <div class="hrlignes">
        <div class="armoirie">
            <a href="/">
                <img src="{{ URL::to('/assets/img/ArmoiriesRCA.png') }}">
            </a>
        </div>
        <div class="geeks"></div>
        <span class="divider-horizontal">
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
    <recensements-table-component class="table-data"></recensements-table-component>
@endsection
