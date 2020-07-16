<?php

namespace App\Http\Controllers;

use App\{Billing, User};
use App\Http\Requests\BillingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function addAddress(BillingRequest $request)
    {
        Billing::create([
            'user_id' => Auth::id(),
            'address' => json_encode($request->post()),
        ]);
        return json_encode(1);
    }

    public function Address()
    {
        return User::find(Auth::id())->billing;
    }

    public function update(Request $request)
    {

    }

    public function getAddress($id)
    {
        return Billing::find($id);
    }
}
