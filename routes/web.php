<?php

use App\Http\Controllers\ErpController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSecondLayerToken;

Route::controller(ErpController::class)->group(function () {
    Route::get('/', 'homepage')->name('homepage');

    Route::get('category_list',  'showCategories');
    Route::get('productsByCategory', 'showProductsByCategory')->name('productsByCategory');
    Route::get('product_details', 'showProductDetails')->name('product_details');
    Route::get('vision-mission-values', 'vision_mission_values')->name('vision-mission-values');
    Route::get('about-us', 'about_us')->name('about-us');
    Route::get('login', 'login_form')->name('login');
    Route::post('login/store',  'login_store')->name('login.store');
    Route::get('registration',  'registration_form')->name('registration');
    Route::post('registration/store','registration_store')->name('registration.store');
    Route::get('registration/complete', 'registration_complete')->name('registration.complete');
    Route::get('products', 'showProducts')->name('products');
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact_store', 'contact_message_store')->name('contact.store');
    Route::get('brochure', 'brochure')->name('brochure');

});




//Custom middleware to check second layer token
Route::middleware([CheckSecondLayerToken::class])->controller(ErpController::class)->group(function (){
    Route::get('dashboard','dashboard')->name('user.dashboard');
    Route::post('logout', 'logout')->name('user.logout');
    Route::get('manage-profile',  'customer_profile')->name('user.profile');
    Route::post('update-profile',  'profile_update')->name('user.profile.update');
    Route::get('change-password',  'change_password')->name('user.change_password');
    Route::post('update-password',  'password_update')->name('user.password_update');
    Route::get('customer-delete',  'customer_delete')->name('user.delete');
    Route::post('add_to_cart', 'add_to_cart')->name('add_to_cart');
    Route::post('update_cart', 'update_cart')->name('update_cart');
    Route::get('cart', 'showCart')->name('cart');
    Route::post('delete_cart', 'delete_cart')->name('delete_cart');
    Route::post('checkout', 'checkout_form')->name('checkout_form');
    Route::post('place_order', 'place_order')->name('place_order');
    Route::get('order_complete', 'order_complete')->name('order_complete');
    Route::post('warehouse_store', 'warehouse_store')->name('warehouse_store');
    Route::get('warehouse_list', 'warehouse_list')->name('warehouse_list');
    Route::get('purchase_history', 'purchase_history')->name('purchase_history');
    Route::get('purchase_history/details/{invoice_id}', 'invoice_details')->name('invoice_details');


});


Route::post('/store-notification', function (Illuminate\Http\Request $request) {
    \App\Models\Notification::create($request->only('title', 'body'));
    return response()->json(['status' => 'stored']);
});

Route::get('session_data', function (){
    $data = session()->all();
    dd($data);
});


Route::get('cache_data', function (){
    $data = \Illuminate\Support\Facades\Cache::get('warehouse_name');
    $data2 = \Illuminate\Support\Facades\Cache::get('warehouse');
    $data3 = \Illuminate\Support\Facades\Cache::get('warehouse_skip');


    dd($data, $data2, $data3);
});

