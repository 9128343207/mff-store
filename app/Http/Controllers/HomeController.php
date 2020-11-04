<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('home'); // TODO use in composer
    }

    public function index2(Request $request)
    {
        $data = (object) [
            'litems' => $this->NewArrivals(),
        ];

        return view('list-product')->with($data);
    }

    // public function Products()
    // {
    //     return (object) [
    //         'NewArrivals' => $this->NewArrivals(),
    //         'TopSelling' => $this->TopSelling(),
    //         'Top3' => $this->Top3(),
    //         'WeeklyDeals' => $this->WeeklyDeals(),
    //     ];
    // }

    public function NewArrivals()
    {
        return Product::NewArrivals()
                    ->with('productPhoto')
                    ->with('category')
                    ->simplePaginate(10);
    }

    // public function TopSelling()
    // {
    //     return  Product::select(self::Column())
    //                 ->with('productPhoto', 'category')
    //                 ->orderBy('sold', 'desc')
    //                 ->limit(30)
    //                 ->get();
    // }

    // public function Top3()
    // {
    //     return Product::select(self::Column())
    //                 ->with('productPhoto')
    //                 ->where('tag', 'top3')
    //                 ->orderBy('sort', 'asc')
    //                 ->limit(3)
    //                 ->get();
    // }

    // public function WeeklyDeals()
    // {
    //     return Product::select(self::Column())
    //                 ->where('tag', 'weeklydeals')
    //                 ->orderBy('sort', 'asc')
    //                 ->limit(6)
    //                 ->get();
    // }

    public function test()
    {
        return Product::find(1)->first();
    }

    public function Filter(Request $request)
    {

    }
}
