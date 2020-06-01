<?php

namespace App\Http\Controllers;

use App\{Shipping, User};
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\BillingRequest;

class ShippingController extends Controller
{
    public function addAddress(BillingRequest $request)
    {
        Shipping::create([
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
        return Shipping::find($id);
    }
}
