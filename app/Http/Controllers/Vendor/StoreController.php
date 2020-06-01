<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function register()
    {
        return view('sell');
    }

    public function create(Request $request)
    {
        $request->validate([
            'store_name' => 'required|unique:stores|max:255',
            'description' => 'required',
        ]);
        $store = new Store();
        $store->store_name = $request->store_name;
        $store->user_id = Auth::user()->id;
        $store->description = $request->description;
        $store->save();
        DB::table('users')->update(['is_seller' => 1]);
            dd($store->id); // TODO redirect to dashboard
    }
}
