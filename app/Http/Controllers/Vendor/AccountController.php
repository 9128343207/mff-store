<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{APaymentMethods, User, VPayAccounts};

use Auth;

class AccountController extends Controller
{
    /**
     * Show vendor Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$store = User::find(Auth::id())->store;
        return view('vendor.account.main')->with('store', $store);
    }
}
