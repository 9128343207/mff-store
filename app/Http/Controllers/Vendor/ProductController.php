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
        // $product = $request->session()->get('product');
        $allCategories = Category::where('type', '=', 'products')->get();
        // dd($allCategories);
        $request->session()->forget('product');
        return view('vendor.products.addProduct1')->with([ 'allCategories' => $allCategories, 'type' => 'new']);
    }

    public function postCreateStep1(ProductListingRequest $request)
    {
        if(empty($request->session()->get('product')) && $request->type == 'new'){
            $product = new Product();
            $product->fill($request->all());
            $request->session()->put('product', $product);
            $request->session()->put('type', 'new');
            $type = 'new';
            
        } elseif ($request->type == 'edit' && isset($request->id))  {
            $product = Product::find($request->id);
            $product->fill($request->all());
            $request->session()->put('product', $product);
            $request->session()->put('type', 'edit');
            $type = 'edit';
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
        
            
            $product = $request->session()->get('product');
            $product->store_id = $this->loggedinUser->store->id;
            $product->status = 'new';
            $product->save();
            $product_id = $product->id;
       switch ($request->session()->get('type')) {
           case 'new':
              $msg = 'New product added successfully.';
               break;
            case 'edit':
               $msg = 'Product edited successfully.';
                break;
           
           default:
               $msg = 'Product Altered';
               break;
       }
 
        if ($request->session()->get('isnewimages') == 1) {
           foreach ($request->session()->get('productImages') as  $image) {
            $productImages = new ProductsPhoto();
            $productImages->filename = $image;
            $productImages->product_id = $product_id;
            $productImages->save();
        }
        }
        
        $request->session()->forget('productImages');
        $request->session()->forget('product');
        return redirect('vendor/products/all')->with('status', $msg);
    }

    public function all()
    {
        // dd($this->loggedinUser->store->id);
        // $products = Store::find($this->loggedinUser->store->id)
        //                 ->first()
        //                 ->products;
        $products = Store::find($this->loggedinUser->store->id)
                        ->products()
                        ->get();
        // $products = Product::where('store_id', $this->loggedinUser->store->id)->get();

                        // dd($products);
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
        $allCategories = Category::where('type', '=', 'products')->get();
        return view('vendor.products.addProduct1')->with(['product' => $product, 'allCategories' => $allCategories, 'type' => 'edit']);
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

    public function DeleteItem($item)
    {
        $product = Product::find($item);
        $product->delete();
        return redirect()->back()->with('status', 'Product deleted successfully.');   
    }


}
