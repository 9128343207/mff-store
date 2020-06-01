<?php

namespace App\Http\Controllers;

use App\Product;
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
        $data =  [
            'items' => (object) $this->getItems($request),
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

    public function getItems($request)
    {
        switch ($request->type) {
            case null:
                return $this->NewArrivals();
                break;
            case 'search':
                return $this->search($request->keyword);
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

    public function search($keyword)
    {
        return Product::search($keyword)
                ->with('productPhoto')
                ->with('category')
                ->simplePaginate($this->perPage);
    }

    public function filter($request)
    {
        return Product::Category($request->category)
                    ->Price($request->min, $request->max)
                    ->with('ProductPhoto')
                    ->with('category')
                    ->simplePagination($this->perPage);
    }
}
