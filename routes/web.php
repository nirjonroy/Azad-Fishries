<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::namespace('Frontend')->group(function () {
	Route::get('/', 'HomeController@homeView')->name('home');

	Route::get('/faq', 'HomeController@faqView')->name('faq');
	Route::get('/contact', 'HomeController@contactView')->name('contact');
	Route::get('/about-us', 'HomeController@aboutusView')->name('aboutus');
	Route::get('/shop', 'ProductController@shopView')->name('shop');
	Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacyPolicy');
	Route::get('/terms', 'HomeController@termCondition')->name('termCondition');
	Route::get('visit', 'HomeController@visitor')->name('total_visitor');
	
	

	Route::get('/product-details/{slug}', 'ProductController@productDetails')->name('productDetails');
	Route::get('/product-moadl/{id}', 'ProductController@productModal')->name('productModal');

	Route::resource('carts', 'CartController');
	Route::get('/get-carts-data', 'CartController@getCartData');
	
	//user dashboard
	Route::middleware('auth')->group(function () {
	    Route::resource('wishlists', 'WishlistController');
		Route::get('/my-account', 'DashboardController@myAccount')->name('myAccount');
		
		Route::get('/user-order-list', 'DashboardController@userOrderList')->name('user_order_list');
		Route::get('/user-order-details/{id}', 'DashboardController@userOrderDetails')->name('user_order_details');
		
		Route::get('profile-details', 'DashboardController@profileDetails')->name('profile_details');
		Route::get('/update-profile', 'DashboardController@updateProfile')->name('update_profile');
		
		Route::post('update-profile', 'DashboardController@postUpdateProfile')->name('post_update_profile');

		Route::resource('checkouts', 'CheckoutController');
		

	});
	
});

Route::namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(function () {
	Route::get('dashboard', 'HomeController@adminDashboard')->name('dashboard');
	Route::resource('sliders', 'SliderController');
	Route::resource('brands', 'BrandController'); 
	Route::resource('charges', 'DeliveryChargeController'); 
	Route::resource('categories', 'CategoryController');
	Route::resource('products', 'ProductController');
	Route::resource('orders', 'OrderController');
	Route::resource('permissions', 'PermissionController');
	Route::resource('users', 'UserController');
	Route::get('users-customers', 'UserController@customerList')->name('customers');
	Route::resource('roles', 'RoleController');
	Route::get('invoice/{id}', 'OrderController@orderInvoice')->name('invoice');
	
	Route::get('newsletters', 'OrderController@newsletters')->name('newsletters');
	Route::get('product_sell', 'HomeController@productSell')->name('productSell');
	Route::get('product_track/', 'HomeController@productTrack')->name('productTrack');
    Route::get('search_track/', 'HomeController@searchTrack')->name('searchTrack');
    Route::get('delete_search/{id}', 'HomeController@delete_search')->name('delete-search');

	// frontend page
});


// admin panel auth handle
Route::namespace('Admin')->group(function () {
	Route::get('admin-login', 'AuthController@login');
	Route::get('admin-register', 'AuthController@register');
	Route::post('admin-login', 'AuthController@postLogin')->name('postLogin');
	Route::post('admin-logout', 'AuthController@logout')->name('adminLogout');

//socialite login

	Route::get('/auth/redirect/{provider}', 'SocialiteController@redirect');
  	Route::get('/callback/{provider}', 'SocialiteController@callback');


});

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::post('/email-store', 'HomeController@emailStore');


Route::get('brand-Wise-Product/{id}', 'Frontend\HomeController@productByBrand')->name('brandWiseProduct');


Route::get('/clear', function(){
    
     \Artisan::call('route:clear');
     \Artisan::call('optimize:clear');
     \Artisan::call('cache:clear');
     \Artisan::call('view:clear');
    return 'done';
});