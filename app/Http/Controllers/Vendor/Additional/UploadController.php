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
use Image;
// use Illuminate\Support\Facades\Storage;

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
            'filename' => 'image|mimes:jpeg,bmp,png|size:2048', // TODO validate file for filetypes
        );

       

        $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return Redirect::back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // if ($validator->fails()) {
        //     return view('vendor.products.addImage');
        // }
        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $file)
            {
                 $name = time().'-'.rand(10000, 999999).'.'.$file->getClientOriginalExtension();
                 $img = Image::make($file->getRealPath());

                    //  $img->resize(385, 200, function ($constraint) {
                    //     $constraint->aspectRatio();                 
                    // });
                    // dd($file->move(public_path().'/files/', $name)); // TODO add function for temp directory
                    // dd($img->stream(storage_path('app/public/products/images/' .$name)));
                    $img->stream();
                     Storage::disk('local')->put('public/products'.'/img/'.$name,  $img, 'public');

                     $img->resize(385, 200, function ($constraint) {
                            $constraint->aspectRatio(); 
                            // $constraint->upsize();                
                        });
                        // $resized200 = $img->response();
                        $img->stream();

                        Storage::disk('local')->put('public/products'.'/385/'.$name,  $img, 'public');

                        $img->resize(200, 200, function ($constraint) {
                            $constraint->aspectRatio(); 
                            // $constraint->upsize();                
                        });
                        // $resized200 = $img->response();
                        $img->stream();

                        Storage::disk('local')->put('public/products'.'/200/'.$name,  $img, 'public');


                         $img->resize(69, 50, function ($constraint) {
                            $constraint->aspectRatio(); 
                            // $constraint->upsize();                      
                        });
                         // $resized69 = $img->response();
                        $img->stream();

                        Storage::disk('local')->put('public/products'.'/69/'.$name,  $img, 'public');

                        $img->resize(60, 60, function ($constraint) {
                            $constraint->aspectRatio(); 
                            // $constraint->upsize();                      
                        });
                        // $resized60 = $img->response();
                        $img->stream();
                        Storage::disk('local')->put('public/products'.'/60/'.$name,  $img, 'public');
                     // dd(Storage::url('products/img/'.$name));

                     // $image = Image::make(Storage::url('products/img/'.$name))->resize(200, 200, function ($c) {
                     //        $c->aspectRatio();
                     //        $c->upsize();
                     //    });
                     // Storage::disk('local')->put('public/products'.'/60/'.$name,  $image->response(), 'public');



                $data[] = $name;
                $request->session()->put('isnewimages', 1);$image = $request->file('image');

                        // $input['imagename'] =  time().'-'.rand(10000, 999999).'.'.$image->extension();

                     

                        // $destinationPath = public_path('/thumbnail');

                        // $img = Image::make($image->path());

                        // $img->resize(100, 100, function ($constraint) {

                        //     $constraint->aspectRatio();

                        // })->save($destinationPath.'/'.$input['imagename']);

                   

                        // $destinationPath = public_path('/images');

                        // $image->move($destinationPath, $input['imagename']);

            }
         }
         if (isset($data)) {
            if(empty($request->session()->get('productImages'))){
                $request->session()->put('productImages', $data);
            }else{
                    $product = $request->session()->get('productImages');
                    $request->session()->put('productImages', $data);
            }
        } else {
            $request->session()->put('isnewimages', 0);
        }
            $product = $request->session()->get('product');
            $productImages = $request->session()->get('productImages');
            $type = $request->session()->get('isnewimages');

       
        return view('vendor.products.itemReview',compact('productImages','product', 'type'));
        

    }

    public function deleteImage(Request $req)
    {
        // dd($req->id);
        $image = ProductsPhoto::find($req->id);
        

        if ($image == null) {
            $msg = 'Product image not found!';
            $code = 0;
        } else {
            $image->delete(); 
            // TODO delete from storage
            $msg = 'Product image deleted successfully';
            $code = 1;
        }
        $data = [
            'msg' => $msg,
            'code' => $code,
            'id' => $req->id,
        ];
        echo json_encode($data);
    }
}
