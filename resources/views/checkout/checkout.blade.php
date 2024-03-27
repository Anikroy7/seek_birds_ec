@extends('layouts.main')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="w-[75%] bg- mx-auto border border-gray-500 p-6 rounded-xl shadow-lg z-10">
        <h2 class="text-lg font-semibold mb-4 text-gray-500">Price Summary</h2>
        <div class="">
            <div class="flex justify-between">
                <span class="text-gray-700 font-bold">Subtotal:</span>
                <span class="font-semibold"><span class="text-2xl font-bold">৳</span> <span
                        class="total_billing">{{ $total_price }}</span></span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-700 font-bold">Shipping:</span>
                <span class="font-semibold"><span class="text-2xl font-bold">৳</span> 0</span>
            </div>
            <div class="flex justify-between font-bold">
                <span class="text-gray-700">Tax:</span>
                <span class="font-semibold"><span class="text-2xl font-bold">৳ </span>0</span>
            </div>
        </div>
        <hr class="my-4 border">
        <div class="flex justify-between">
            <span class="text-lg font-semibold">Total:</span>
            <span class="text-lg font-semibold text-orange-400"><span class="text-2xl font-bold">৳</span> <span
                    class="total_billing">{{ $total_price }}</span></span>
        </div>
    </div>
    <div class="min-h-screen p-4 leading-loose z-0">
        <p class=" text-center w-full font-bold text-3xl"><span class="text-orange-500">Billing</span> details
        </p>
        <form action="{{ route('checkout.store') }}" method="POST"
            class="w-[70%] mx-auto m-4 p-4 bg-white rounded shadow-xl">
            @csrf
            <p class="text-gray-800 font-medium">Customer information</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="cus_name">Name</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_name" name="cus_name"
                    type="text" placeholder="Your Name" aria-label="Name" value="{{ old('cus_name') }}">
                @error('cus_name')
                    <div class="text-red-600 font-semibold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email"
                    type="email" placeholder="Your Email" aria-label="Email" value="{{ old('cus_email') }}">
                @error('cus_email')
                    <div class="text-red-600 font-semibold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_address">Address</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_address" name="cus_address"
                    type="text" placeholder="Your Address" aria-label="Address" value="{{ old('cus_address') }}">
                @error('cus_address')
                    <div class="text-red-600 font-semibold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_phone">Phone</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_phone" name="cus_phone"
                    type="text" placeholder="Your Phone No." aria-label="phone" value="{{ old('cus_phone') }}">
                @error('cus_phone')
                    <div class="text-red-600 font-semibold">{{ $message }}</div>
                @enderror
            </div>

            <p class="mt-4 text-gray-800 font-medium">Payment information <span class="text-red-500 font-semibold">* (If
                    Paid)</span></p>
            <div class="">
                <label class="block text-sm text-gray-600" for="bkash_number">Bkash Number</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="bkash_number" name="bkash_number"
                    type="text" placeholder="" aria-label="Bkash Number" value="{{ old('bkash_number') }}">
            </div>
            <div class="mt-4">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
                    <span class="text-2xl font-bold">৳</span> 3.00
                </button>
            </div>
        </form>


    </div>
@endsection


{{-- @section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.ajax({
                url: "/cart",
                method: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                    $(".total_billing").text(response.total_price);

                },
                error: function(response) {
                    console.log("Error", response);
                },
            });
        })
    </script>
@endsection --}}
