<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view('database', compact('agents'));
    }

    public function store(Request $req) {
        Agent::create([
            'password' => $req['password'],
            'city' => $req['city'],
            'prefecture' => $req['prefecture'],
            'agent' => $req['agent'],
        ]);
        return view('database');
    }

    public function delete($id) {
        $agents = Agent::all();
        $country = Agent::find($id);
        $country->delete();
        return redirect()->route('dba');
    }
}
