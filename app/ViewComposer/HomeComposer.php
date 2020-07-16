<?php

namespace App\ViewComposer;

use Illuminate\View\View;
use App\Product;

class HomeComposer {

    public $items = [];

    public function __construct() {
        $this->items[] = $this->Products();
    }

    public function compose(View $view) {
        $view->with('products', $this->items[0]);
    }

    // public function index()
    // {
    //     $cart = Auth::user()->cart; // TODO use in composer
    //     return view('home')->with(['products'=> $this->Products(), 'cart' => $cart]); // TODO use in composer
    // }

    public function Products()
    {
        return (object) [
            'NewArrivals' => $this->NewArrivals(),
            'TopSelling' => $this->TopSelling(),
            'Top3' => $this->Top3(),
            'WeeklyDeals' => $this->WeeklyDeals(),
        ];
    }

    public function NewArrivals()
    {
        return Product::select(Product::BasicColumn())
                    ->with('productPhoto')
                    ->with('category')
                    ->orderBy('id', 'desc')
                    ->limit(40)
                    ->get();
    }

    public function TopSelling()
    {
        return  Product::Popular()
                    ->select(Product::BasicColumn())
                    ->with('productPhoto', 'category')
                    ->get();
    }

    public function Top3()
    {
        return Product::Top3()
                    ->select(Product::BasicColumn())
                    ->with('productPhoto')
                    ->get();
    }

    public function WeeklyDeals()
    {
        return Product::select(Product::BasicColumn())
                    ->where('tag', 'weeklydeals')
                    ->orderBy('sort', 'asc')
                    ->limit(6)
                    ->get();
    }

    public function test()
    {
        return Product::find(1)->first();
    }
}
