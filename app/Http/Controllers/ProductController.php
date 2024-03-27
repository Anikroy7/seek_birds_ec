<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = new Product();
        $data = $products->get();
        $userId = $request->cookie('user_id');
        $cartInfo = getCartInfo($userId);
        $total_items = $cartInfo['total_items'];
        
        return  view('home.home', compact('data', 'total_items'));
    }
    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        return view('productDetails.productDetails', compact('product'));
    }
    function cart_item_old(Request $request)
    {
        $products = [];
        $items = [];
        $total_price = 0;
        $total_items = 0;
        $itemsId = session()->get('productIds');
        if ($itemsId) {
            foreach ($itemsId as $index => $item) {
                foreach ($item as $key => $value) {
                    $product = Product::findOrFail($key);
                    $products[$index] = $product;
                    $items[$key] = $value;
                }
            }
        }
        // dd($products);
        if ($products && $items) {
            foreach ($products as $key => $value) {
                $total_price += $value->current_price * $items[$value->id];
            }
            foreach ($items as $key => $value) {
                $total_items += $value;
            }
        }
        if ($request->ajax()) {
            // If AJAX request, return JSON data
            return response()->json([
                'products' => $products,
                'items' => $items,
                'total_price' => $total_price,
                'total_items' => $total_items,
            ]);
        }
        // dd($total_price);
        return view('cart.cart', compact('products', 'items', 'total_price', 'total_items'));
    }
    function cart_item(Request $request)
    {
        $userId = $request->cookie('user_id');
        $cartInfo = getCartInfo($userId);
        $products = $cartInfo['products'];
        $total_price = $cartInfo['total_price'];
        $total_items = $cartInfo['total_items'];
        $items = $cartInfo['items'];   
        
        return view('cart.cart', compact('products', 'items', 'total_price', 'total_items'));
    }
}
