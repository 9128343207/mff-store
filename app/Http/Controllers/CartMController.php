<?php

namespace App\Http\Controllers;

use App\CartM;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vendor\ProductController as similar;

class CartMController extends Controller
{
    public $attributes = [];
    public $cartItems = [];

    public function __construct()
    {
        // $this->cartItems = $this->getCart();
    }

    public static function CartAttributes()
    {
        return [
            'id', 'name', 'price', 'discount_price'
        ];
    }

    public function index()
    {
        // dd(json_Decode($this->CartItems()));
        return view('cart')->with([
            'items' => json_decode($this->CartItems()),
            // 'moreItems' => similar::SimilarProducts($this->Products()),
        ]);
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            if(!$this->IsItemExist((int) $request->productId)) {
                $this->SaveInDatabase($request);
                return json_encode(1);
            } else {
                return json_encode(0);
            }
        } else {
            $this->SaveInSession($request);
            return json_encode(1);
        }
    }

    public function getCart()
    {
        if (Auth::check()) {
            return CartM::where('user_id', Auth::user()->id)->get();
        } else {
            return $this->getSessionCart();
        }
    }

    public function getSessionCart()
    {
        if (session('cart')) {
            return session('cart');
        } else {
            return session()->put('cart', $this->sessionCart);
        }
    }

    public function CartProductIds($Items)
    {
        // dd($Items);
        if ($Items != null) {
            $productIds = [];
            foreach ($Items as $item) {
                array_push($productIds, $item->product_id);
            }
            return $productIds;
        } else {
            return array();
        }
    }

    public function IsItemExist($newItemId)
    {
        return in_array($newItemId, $this->CartProductIds($this->getCart()));
    }

    public function SaveInDatabase($request)
    {
        return CartM::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->productId,
                    'quantity' => (int) $request->quantity,
                    'attributes' => json_encode($this->attributes), // TODO Add attribute function
                ]);
    }

    public function SaveInSession($request)
    {
            $cart = new CartM();
            $cart->fill($request->all());
            return  $request->session()->put('cart', $cart); //TODO make this in proper
    }

    public function CartItems()
    {
        // dd($this->getCart());
        if (Auth::check()) {
            $Items = $this->getCart();
            $ids = $this->CartProductIds($Items);
            $data = [
                'count' => count($ids),
                'items' => $this->fillAttribute($this->Products()),
                'productIds' => $ids,
                'cartTotal' => $this->CartTotal(),
            ];
        } else {
            $data = session('cart');
        }
        return json_encode($data);
    }

    public function Products()
    {
        return User::find(Auth::user()->id)->products;
    }

    public function fillAttribute($items)
    {
        $subset = $items->map(function ($item) {
            $itemns = array();
            $itemns['itemDetail'] = $item->only(self::CartAttributes());
            $itemns['image'] = $item->productPhoto->map(function ($image) { return $image->only(['filename']);});
            $itemns['qty'] = $this->getQty($item);
            $itemns['store'] = $item->store->id;
            return $itemns;
        });
        return $subset;
    }

    public function getQty($item)
    {
        $user = Auth::id();
        // dd($user);
        $cartItem = CartM::where('user_id', '=', $user)
                        ->where('product_id', $item->id)
                        ->get();
                        return $cartItem[0]->quantity;
    }

    public function CartTotal()
    {
        return array_sum($this->getPrice($this->Products()));
    }

    public function getPrice($Items)
    {
        $price = [];
        foreach ($Items as $item) {
            array_push($price, (int) $item->price);
        }
        return $price;
    }

    public function ClearCart()
    {
        CartM::where('user_id', '=', Auth::user()->id)->delete();
        if(session()->get('cart')){
            session()->forget('cart');
        }
        return view('cart');
    }

    public function remove(Request $request)
    {
        $cartItem = $this->GetCartId($request->id);
        $cartItem->delete($cartItem);
        return redirect()->back()->with('success', 'Removed successfully');
    }

    public function GetCartId($productId)
    {
        return CartM::where('product_id', '=', $productId)->where('user_id', Auth::id())->first();
    }

    public function updateCart(Request $request)
    {
        $item = $this->GetCartId($request->item);
        $item->quantity = $request->qty;
        $item->save();
    }
    //TODO add function for discount price

    //TODO add event listener for saving cart session data to database after login
}
