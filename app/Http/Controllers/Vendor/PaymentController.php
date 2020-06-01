<?php

namespace App\Http\Controllers\Vendor;

use App\{APaymentMethods, User, VPayAccounts};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('vendor.payment.index');
    }

    public function methods()
    {
        return view('vendor.payment.methods');
    }

    public function methodAttributes(Request $request)
    {
        $attributes = APaymentMethods::find($request->method);
        return $attributes->attributes;
    }

    public function add(Request $request)
    {
        $ACIds = [];
        foreach ($request->formData as  $value) {
            $ACIds[$value['name']] = $value['value'];
        }
        $methodId = (int) $request->method;
        VPayAccounts::create([
            'store_id' => User::find(Auth::id())->store->id,
            'title' => 'title',
            'a_payment_methods_id' => $methodId,
            'attributes' => json_encode($ACIds),
        ]);
        return json_encode(1);
    }
}
