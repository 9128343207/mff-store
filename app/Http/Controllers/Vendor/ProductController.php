<?php

namespace App\Http\Controllers\Vendor;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductListingRequest;
use App\Product;
use App\ProductsPhoto;
use App\Store;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $loggedinUser = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->loggedinUser = Auth::user();
            return $next($request);
       });
    }

    public function createStep1(Request $request)
    {
        $product = $request->session()->get('product');
        $allCategories = Category::where('parent_id', '=', 1)->get();
        return view('vendor.products.addProduct1')->with(['product' => $product, 'allCategories' => $allCategories]);
    }

    public function postCreateStep1(ProductListingRequest $request)
    {
        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($request->all());
            $request->session()->put('product', $product);
        } else {
            $product = $request->session()->get('product');
            $product->fill($request->all());
            $request->session()->put('product', $product);
        }
        $productImages = (empty($request->session()->get('productImages'))) ? '' : session()->get('productImages');
        return view('vendor.products.addImage')->with('productImages', $productImages);
    }

    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function removeImage(Request $request)
    {
        $product = $request->session()->get('product');
        $product->productImg = null;
        return view('products.create-step2',compact('product', $product));
    }

    public function store(Request $request)
    {
        $product = $request->session()->get('product');
        $product->store_id = $this->loggedinUser->store->id;
        $product->status = 'new';
        $product->save();
        foreach ($request->session()->get('productImages') as  $image) {
            $productImages = new ProductsPhoto();
            $productImages->filename = $image;
            $productImages->product_id = $product->id;
            $productImages->save();
        }
        $request->session()->forget('productImages');
        $request->session()->forget('product');
        return redirect('vendor/products/all')->with('status', 'New product added!');
    }

    public function all()
    {
        $products = Store::find($this->loggedinUser->store)
                        ->first()
                        ->products;
        return view('vendor.products.all-products', compact('products', $products));
    }

    public function EditItem(Request $request, $item)
    {
        $product = Product::find($item)
                        ->where('id', '=', $item)
                        ->first();
                    session([
                        'product' => $product,
                        'productImages' => $product->productPhoto
                    ]);
        return view('vendor.products.addProduct1', compact('product', $product));
    }

    public function SingleProduct(int $id)
    {
        $item = Product::findOrFail($id);
        $data = [
            'item'      => $item,
            'similars'   => self::SimilarProducts($item)
        ];
        return view('single')->with($data);
    }

    public static function SimilarProducts($product)
    {
        return Product::Similar($product)
                    ->select(Product::BasicColumn())
                    ->get();
    }


}
