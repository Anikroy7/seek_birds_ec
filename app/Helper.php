<?php

use App\Models\Product;
use Illuminate\Support\Facades\DB;

if (!function_exists('getCartInfo')) {
    function getCartInfo($userId)
    {
        $products = [];
        $items = [];
        $total_price = 0;
        $total_items = 0;
        // dd($userId);
        $userInfo = DB::table('cart_items')->where('user_id', $userId)->first();
        // dd($userInfo);   

        if($userInfo){
            $itemsId = json_decode($userInfo->product_ids);
            // dd(json_decode($userInfo->product_ids));
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
        }
        // dd($total_items);   

        return [
            'products' => $products,
            'items' => $items,
            'total_price' => $total_price,
            'total_items' => $total_items
        ];
    }
}
