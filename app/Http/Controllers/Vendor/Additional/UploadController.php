<?php

namespace App\Http\Controllers\Vendor\Additional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Product;
use App\ProductsPhoto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('vendor.products.addImage');
    }

    public function uploadSubmit(Request $request)
    {
        // dd($request);
        $rules = array(
            'filename' => 'required | max:2000', // TODO validate file for filetypes
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->fails()) {
            return view('vendor.products.addImage');
        }
        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $file)
            {
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name); // TODO add function for temp directory
                $data[] = $name;
            }
         }
        if(empty($request->session()->get('productImages'))){
            $request->session()->put('productImages', $data);
        }else{
            $product = $request->session()->get('productImages');
            $request->session()->put('productImages', $data);
        }

        $product = $request->session()->get('product');
        $productImages = $request->session()->get('productImages');
        return view('vendor.products.itemReview',compact('productImages','product'));
        // dd($request->session());
               // dd($request->files);

    }
}
