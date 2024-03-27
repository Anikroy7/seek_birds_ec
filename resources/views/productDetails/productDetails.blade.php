@extends('layouts.main')
{{-- @dd($product->description)      --}}
@section('title')
    Product Details
@endsection
@section('content')
    <div class="container mx-auto py-8">
        <!-- Product Details Container -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-2">
            <!-- Product Image -->
            <div>
                <img class="mx-auto max-w-full h-full" src="{{ $product->image_url }}" alt="Product Image">
            </div>
            <!-- Product Info -->
            <div class="md:flex md:flex-col justify-between col-span-2">
                <div>
                    <!-- Product Title -->
                    <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $product->title }}</h1>
                    <!-- Product Price -->
                    <p class="text-2xl font-bold text-orange-500 mb-4">${{$product->current_price}}</p>
                    <!-- Product Description -->
                    <p class="text-gray-700 text-justify">{!! $product->description !!}</p>
                    <!-- Add to Cart Button -->
                </div>
                <div>
                    <a onclick="addToCart(event, '{{$product->id}}', '+')" {{-- href="{{ route('cart.index') }}" --}}
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-opacity-50">Add
                    to Cart</a>
                <a href="{{ route('checkout.index') }}"
                    class="bg-black hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-opacity-50">Buy
                    Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
