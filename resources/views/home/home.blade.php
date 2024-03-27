
@extends('layouts.main')
@section('title')
    home
@endsection
@section('content')
    <div class="py-20 bg-repeat bg-fixed relative"
        style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkUw_65T7o3jy8Z-FkeHfk26CbuKofT0-ZqA&usqp=CAU);">
        <div class="container mx-auto text-center px-6 opacity-100">
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-2 text-white">GET YOUR BEST <span
                    class="text-orange-400">WALLET</span> HERE</h2>
            <h3 class="text-lg sm:text-xl md:text-2xl mb-8 text-gray-200">Not much, but it could be a life form. This is
                Rouge Two. this is Rouge Two. Captain Solo, so you copy?</h3>
            <a href="#products"
                class="bg-white font-bold rounded-full py-3 sm:py-4 px-6 sm:px-8 shadow-lg uppercase tracking-wider hover:border-transparent hover:text-orange-500 hover:bg-gray-100 transition-all">Browse
                Products</a>
        </div>
    </div>
    <div class="">
        @include('products.products')
    </div>
    <div class="">
        @include('home.contact')
    </div>
@endsection
