<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenralController extends Controller
{
    public function privacy()
    {
    	return view('privacy');
    }

    public function terms()
    {
    	return view('terms');
    }

    public function disc()
    {
    	return view('disc');
    }
}
