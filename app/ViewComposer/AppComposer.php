<?php

namespace App\ViewComposer;

use Illuminate\View\View;
use App\Product;

class AppComposer {

    public $items = [];

    public function __construct() {
        // $data = [
        //     'brands' => Brand::all(),
        //     'categories' => Category::all(),
        //     'deals' => Deal::all(),
        // ];
dd($this->Products());
        $this->items[] = $this->Products();
    }

    public function compose(View $view) {
        $view->with('products', $this->items);
    }

    public static function Column()
    {
        return ['id', 'name', 'bname', 's_desc', 'price', 'discount_price', 'tag', 'sold'];
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
        return Product::select(self::Column())
                    ->with('productPhoto')
                    ->with('category')
                    ->limit(40)
                    ->get();
    }

    public function TopSelling()
    {
        return  Product::select(self::Column())
                    ->with('productPhoto', 'category')
                    ->orderBy('sold', 'desc')
                    ->limit(30)
                    ->get();
    }

    public function Top3()
    {
        return Product::select(self::Column())
                    ->with('productPhoto')
                    ->where('tag', 'top3')
                    ->orderBy('sort', 'asc')
                    ->limit(3)
                    ->get();
    }

    public function WeeklyDeals()
    {
        return Product::select(self::Column())
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
