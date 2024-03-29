<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';

});

/* Route::post('/store-session', function (Request $request) {
    Session::put('productIds', $request->input('value'));

    return response()->json(['message' => 'Session value stored successfully']);
}); */
/* Route::post('/delete-session', function (Request $request) {
    Session::put('productIds', $request->input('value'));

    return response()->json(['message' => 'Session value stored successfully']);
}); */
Route::get('/clear-session', function () {
    Session::flush();
    return '<h1>Session data cleared</h1>';
});

Route::get('/', [ProductController::class, 'index'])->name('home.index');

Route::post('/add-to-cart', [CheckoutController::class, 'addCart']);

Route::get('/product/{id}', [ProductController::class, 'product_details'])->name('product.details');
// Route::get('/product/delte/{id}', [ProductController::class, 'product_delete'])->name('product.delete');

Route::get('/cart', [ProductController::class, 'cart_item'])->name('cart.index');

Route::post('/checkout/store', [StoreOrderController::class, 'store'])->name('checkout.store');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/checkout/failed', [CheckoutController::class,'failed'])->name('checkout.failed');

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

/* Route::get('/product/id', function(){
    return view('productDetails.productDetails');
})->name('productDetails.index'); */