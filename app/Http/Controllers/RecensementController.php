<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;

class RecensementController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view('recensement', compact('agents'));
    }
}
