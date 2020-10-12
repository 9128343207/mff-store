<?php

namespace App\Http\Controllers;

use App\{Product, Category};
use Illuminate\Http\Request;
use Cookie;

class HomeController2 extends Controller
{
    public $perPage = 10;

    // public $items = [];

    public function __construct(Request $request)
    {   $perpage = (int) $request->cookie('perpage');
         $this->perPage = ($request->cookie('perpage')) ?  $perpage : 10;
    }

    public function index(Request $request)
    {
         // dd($request);
        $data =  [
            'items' => (object) $this->getItems($request),
        ];

        return view('list-product')->with($data);
    }

    public function productByCategory($id)
    {
        
        $data = [
            'items' => Product::where('category_id', $id)->with('productPhoto')->paginate($this->perPage),
        ];
        return view('list-product')->with($data);
    }

    public function Sort(Request $request)
    {
        // dd((int) $request->value);
        switch ($request->type) {
            case 'popularity':
                Cookie::queue('popularity', (int) $request->value);
                break;

            case 'perpage':
                Cookie::queue('perpage', (int) $request->value);
                break;

            default:
                # code...
                break;
        }
        return redirect()->back();
    }

    public function ProductSearch(Request $req)
    {
        $data =  [
            'items' => (object) $this->search($req),
        ];

        return view('list-product')->with($data);
    }

    public function getItems($request)
    {
        switch ($request->type) {
            case null:
                return $this->NewArrivals();
                break;
            case 'search':
                return $this->search($request);
                break;
            case 'filter':
                return $this->filter($request);
                break;
            case 'perpage':
                return $this->filter($request);
                break;
            default:
                return $this->NewArrivals();
                break;
        }
    }

    public function NewArrivals()
    {
        return Product::NewArrivals()
                    ->with('productPhoto')
                    ->with('category')
                    ->paginate($this->perPage);
    }

    public function search($request)
    {
        $serchresult =  Product::search($request->keyword)
                        ->with('productPhoto')
                        ->with('category')
                        ->Paginate($this->perPage);

                        // $serchresult->withPath(route('product.search'));
                        return $serchresult;
    }

    public function filter($request)
    {
        $filterResult = Product::where(function ($query) use ($request) {
                    foreach ($request->category as $key => $value) {
                       $query->orWhere('category_id', '=', $value);
                    }
                       
                    })
                    ->with('ProductPhoto')
                    ->with('category')
                    ->Paginate($this->perPage);
                    // dd($filterResult);
                    return $filterResult;
    }

    public function productByNamedCategory($name)
    {

        $cat =  Category::where('title', str_replace('-', ' ', $name))->first();
       $data = [
            'items' => Product::where('category_id', $cat->id)->with('productPhoto')->with('category')->paginate($this->perPage),
        ];
        // dd($data['items'][0]->id);

        
        return view('list-product')->with($data);
    }
}
