<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facade at the top of your file
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller
{
    function index(Request $request)
    {
        $userId = $request->cookie('user_id');
        $cartInfo = getCartInfo($userId);
        $products = $cartInfo['products'];
        $total_price = $cartInfo['total_price'];
        $total_items = $cartInfo['total_items'];
        $items = $cartInfo['items'];

        return view('checkout.checkout', compact('products', 'items', 'total_price', 'total_items'));
    }

    function success(Request $request)
    {
        $userId = $request->cookie('user_id');
        $cartInfo = getCartInfo($userId);
        $total_items = $cartInfo['total_items'];
        return view('checkout.successfull', compact('total_items'));
    }
    function failed()
    {
        return view('checkout.failed');
    }

    public function addCart(Request $request)
    {
        $userId = $request->cookie('user_id');
        if (!$userId) {
            $userId = Uuid::uuid4()->toString(); // Generate a UUID
            Cookie::queue('user_id', $userId, 60 * 24 * 30); // Set the user_id cookie for 30 days
        }

        // Retrieve data from the AJAX request and store it in the database
        $cartData = json_decode($request->getContent(), true); // Assuming you're sending cart data in the AJAX request
        // dd($cartData);
        // dd($request->all);
        // Store $cartData along with $userId in your database
        // For example:
        // Cart::create(['user_id' => $userId, 'data' => json_encode($cartData)]);
        // dd($cartData);
        $response = DB::table('cart_items')
            ->updateOrInsert(
                ['user_id' => $userId], // Condition to check if the record already exists
                ['product_ids' => $cartData] // Data to insert or update
            );

        return response()->json(['message' => 'Cart data added successfully', /* 'cartId' => $respose, */ 'cartData' => $response]);
    }
}
