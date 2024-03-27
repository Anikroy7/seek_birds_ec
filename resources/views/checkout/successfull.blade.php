@extends('layouts.main')
@section('title')
    Checkout | Successfull
@endsection

@section('content')
    <!-- Order Placed Successfully Content -->
    <section class="container mx-auto mt-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-center text-green-500">
                <i class="fas fa-check-circle text-5xl"></i> <!-- Success Icon -->
            </div>
            <h2 class="text-lg font-semibold text-center mb-4">Order Placed Successfully!</h2>
            <p class="mb-4 text-center">Thank you for your order. Your order has been successfully placed.</p>
            <p class="text-center">Your order confirmation number is: <span class="font-semibold">ABC123456</span></p>
            <p class="mt-4 text-center">You will receive an email confirmation shortly.</p>
            <div class="mt-6 flex justify-center">
                <a href="{{route('home.index')}}" class="inline-block bg-orange-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 textc">Continue Shopping</a>
            </div>
        </div>
    </section>
@endsection
