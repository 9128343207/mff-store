<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show vendor Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('vendor.home');
    }
}
