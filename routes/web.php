<?php
//route da ngon ngu
Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localizationRedirect' ]
],
function(){
	//route dang ki KHACH HANG
	Route::get('dangki',['as'=>'getRegister','uses'=>'UserController@getRegister']);
	Route::post('dangki',['as'=>'postRegister','uses'=>'UserController@postRegister']);

	Route::get('dangnhap',['as'=>'getLogin','uses'=>'UserController@getLogin']);
	Route::post('dangnhap',['as'=>'postLogin','uses'=>'UserController@postLogin']);

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
	Route::get('/', 'PageController@getIndex')->name("frontend.page.trangchu");

	Route::get(LaravelLocalization::transRoute('routes.about_us'), 'PageController@About_us')->name("about_us");

	Route::get('loai-san-pham/{type}',[
		'as'=>'loaisanpham',
		'uses'=>'PageController@getLoaisp'
		]);
	Route::get('chi-tiet-san-pham/{id}',[
		'as'=>'chitiet_sanpham',
		'uses'=>'PageController@getChiTiet'
		]);






	Route::get('/home', 'HomeController@index')->name('home');

	//custom ten route: trong helper, dung class @show
	/*Route::get('lien-he',[
				'as'=>'lienhe',
				'uses'=>'PageController@getLienHe'
				]);
			Route::get('gioi-thieu',[
				'as'=>'gioithieu',
				'uses'=>'PageController@getGioiThieu'
				]);*/
			
	Route::get('{slug}', 'PageController@getIndex')->name('frontend.page.index');

	Route::get('cart',[
			'as'=>'giohang',
			'uses'=>'ShoppingCartController@viewCart'
			]);

});


