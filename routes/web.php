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

	Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
		//dùng bảo mật middleware, mún vào route dưới thì phải đăng nhập
			Route::get('lien-he',[
				'as'=>'lienhe',
				'uses'=>'PageController@getLienHe'
				]);
			Route::get('gioi-thieu',[
				'as'=>'gioithieu',
				'uses'=>'PageController@getGioiThieu'
				]);
	});
	//-------------route giao dien nguoi dung
	/*Route::get('/',[
		'as'=>'trangchu',
		'uses'=>'PageController@getIndex'
		]);*/
	Route::get(LaravelLocalization::transRoute('routes.home'), 'PageController@getIndex')->name("trangchu");

	/*Route::get(LaravelLocalization::transRoute('routes.product_category'), 'PageController@getLoaisp')->name("loaisanpham");*/

	Route::get('loai-san-pham/{type}',[
		'as'=>'loaisanpham',
		'uses'=>'PageController@getLoaisp'
		]);
	Route::get('chi-tiet-san-pham/{id}',[
		'as'=>'chitiet_sanpham',
		'uses'=>'PageController@getChiTiet'
		]);
	Route::get('cart',[
		'as'=>'giohang',
		'uses'=>'ShoppingCartController@viewCart'
		]);
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
		
	//Route::resource('/cart', 'CartController');
	Route::get('checkout',[
		'as'=>'checkout',
		'uses'=>'ShoppingCartController@ChecKout'
		]);
	Route::post('checkout',[
		'as'=>'checkout',
		'uses'=>'ShoppingCartController@postChecKout'
		]);




	Route::get('/home', 'HomeController@index')->name('home');
});


