<?php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localizationRedirect' ]
],
function(){
	Route::get(LaravelLocalization::transRoute('routes.register'), 'UserController@getRegister')->name("frontend.register");

	Route::get(LaravelLocalization::transRoute('routes.login'), 'UserController@getLogin')->name("frontend.login");

	Route::post(LaravelLocalization::transRoute('routes.login'), 'UserController@postLogin')->name("frontend.login");

	Route::get('dangxuat',['as'=>'getLogout','uses'=>'UserController@getLogout']);

	//quen mat khau
	Route::get('forget.html',['as'=>'getForget','uses'=>'UserController@getForget']);
	Route::post('forget.html',['as'=>'postForget','uses'=>'UserController@postForget']);


	//chức năng tìm kiếm
	Route::get('search',['as'=>'search','uses'=>'PageController@getSearch']);

	//cart->dung middleware de ko cho vao route
	Route::get('cart',[
			'as'=>'giohang',
			'uses'=>'ShoppingCartController@viewCart'
			]);
		Route::get(LaravelLocalization::transRoute('routes.checkout'), 'ShoppingCartController@ChecKout')->name("checkout");
		Route::get('cart/addCart/{id}',[
			'as'=>'themgiohang',
			'uses'=>'ShoppingCartController@addItem'
			]);
		
		//cap nhat theo id vs so luong 
		Route::get('cap-nhat-gio/{id}',[
			'as'=>'capnhatgio',
			'uses'=>'ShoppingCartController@update'
			]); 
		
		Route::get('cart/removeCart/{id}',[
			'as'=>'xoagiohang',
			'uses'=>'ShoppingCartController@removeItem'
			]);

		//shiporder -- form khoapham phải login mới dc lưu hàng
		Route::get('ship-order',[
			'as'=>'ship-order',
			'uses'=>'ShoppingCartController@ShipOrder'
			]);
		Route::post('ship-order',[
			'as'=>'ship-order',
			'uses'=>'ShoppingCartController@postShipOrder'
			]);
			
		//checkout-->dùng stepbar(t.hop ko dki tai khoang, dang nhap)
		Route::get(LaravelLocalization::transRoute('routes.checkout'), 'ShoppingCartController@ChecKout')->name("checkout");
		Route::get('checkout',[
			'as'=>'checkout',
			'uses'=>'ShoppingCartController@ChecKout'
			]);
		Route::post('checkout',[
			'as'=>'checkout',
			'uses'=>'ShoppingCartController@postChecKout'
			]);
	
	//trang chu đã đặt transroute ở đâu đó rồi! chắc do dấu /
	Route::get('/', 'PageController@getIndex')->name("trangchu");

	Route::get(LaravelLocalization::transRoute('routes.about_us'), 'PageController@About_us')->name("about_us");

	Route::get('loai-san-pham/{type}',[
		'as'=>'loaisanpham',
		'uses'=>'PageController@getLoaisp'
		]);
	Route::get('chi-tiet-san-pham/{id}',[
		'as'=>'chitiet_sanpham',
		'uses'=>'PageController@getChiTiet'
		]);

	//Route::get(LaravelLocalization::transRoute('routes.product_category'), 'PageController@getLoaisp')->name("loaisanpham");
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('{slug}', 'PageController@getIndex')->name('frontend.page.index');

	//custom route gioi thieu, lien lac: trong helper, dung class @show
	//frontend.page.index =>header

	Route::get('cart',[
			'as'=>'giohang',
			'uses'=>'ShoppingCartController@viewCart'
			]);

});


