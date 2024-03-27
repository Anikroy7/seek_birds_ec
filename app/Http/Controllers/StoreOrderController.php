<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class StoreOrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate(

            [
                'cus_name' => 'required',
                'cus_address' => 'required',
                'cus_email' => ['required', 'regex:/^.+@.+$/i'],
                'cus_phone' => 'required|size:11|regex:/(01)[0-9]{9}/',
            ],
            [
                'cus_name.required' => 'Please enter your name',
                'cus_address.required' => 'Please enter your address',
                'cus_email.required' => 'Please enter your email',
                'cus_email.regex' => 'Please enter a valid email address',
                'cus_phone.required' => 'Please enter your mobile no.',
                'cus_phone.size' => 'Mobile number should be 11 digits',
                'cus_phone.regex' => "Invalid mobile number "
            ],

        );
        $data = [];
        $products = [];
        $items = [];
        $totalAmount = 0;
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
                $totalAmount += $value->current_price * $items[$value->id];
            }
            foreach ($items as $key => $value) {
                $total_items += $value;
            }
        }
        $data['customerName'] = $request->cus_name;
        $data['cus_address'] = $request->cus_address;
        $data['cus_email'] = $request->cus_email;
        $data['cus_phone'] = $request->cus_phone;
        $data['totalAmount'] = $totalAmount;
        $data['message'] = 'Confirmation for your order';
        $data['products'] = $products;
        $data['items'] = $items;
        $subject = 'Your order is confirmed';
        $toEmails = [$request->cus_email, 'anikkumerroy7@gmail.com'];
        /* $toMail= 'anikkumerroy7@gmail.com';
        $message= 'This is a message from birdseeker';
        $Subject= 'Confirm order for bird seeker'; */
        // $customerName = $request->cus_name;
        //send mail
        //   Mail::send('mail.templete', ['name' => $request->cus_name], function ($message) use ($request) {
        //     $message->to($request->cus_email);
        //     $message->subject('Reset-password');
        // });


        try {

            $order = new Order();
            $order->customer_name = $request->cus_name;
            $order->customer_address = $request->cus_address;
            $order->customer_email = $request->cus_email;
            $order->customer_phone = $request->cus_phone;
            $order->products = json_encode($itemsId);
            $order->save();
            
            foreach ($toEmails as $key => $email) {
                $response = Mail::to($email)->send(new OrderMail($data, $subject));
            }
            if($response){
                return redirect('/checkout/success');
            }else{
                return redirect('/checkout/failed');
            } 
            //code...
        } catch (\Throwable $e) {
            dd('This is come from order,', $e); 
            return redirect('/checkout/failed');
        }


        /* 
        foreach ($toEmails as $key => $email) {
            $response = Mail::to($email)->send(new OrderMail($data, $subject));
        }
        if($response){
            return redirect('/checkout/success');
        }else{
            return redirect('/checkout/failed');
        } */
    }
}
