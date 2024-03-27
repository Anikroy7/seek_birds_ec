@extends('layouts.main')

@section('title')
    Checkout | Failed
@endsection

@section('content')
    <!-- Order Placed Successfully Content -->
    <section class="bg-gray-300 h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center mb-4">Failed to Purchase</h1>
            <p class="text-red-500 text-center mb-4">We're sorry, your purchase could not be completed at this time.</p>
            <p class="text-center">Please try again later or contact support for assistance by this number: <span class="text-orange-500">01744198060</span></p>
            <div class="mt-6 flex justify-center py-4">
                <a href="{{route('home.index')}}" class="inline-block bg-orange-500 text-white py-1 px-3 rounded-md shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 textc">Back To Home</a>
            </div>
        </div>
    </section>
@endsection
