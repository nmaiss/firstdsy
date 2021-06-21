<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModifierRecensementController extends Controller
{
    public function index($id){
        $agent = Agent::where('id', '=', $id);
        return view('recensement_change', compact('agent'));
    }
}
