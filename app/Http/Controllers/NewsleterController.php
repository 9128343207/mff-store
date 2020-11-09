<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newsleter;

class NewsleterController extends Controller
{
    public function add(Request $req)
    {
    	newsleter::create([
    		'email' => $req->email,
    	]);
    	return json_encode(1);
    }
}
