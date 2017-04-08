<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['prefix'=> 'kanepe', 'middleware'=>'auth'], function(){

	Route::get('/', 'PageController@index');

	Route::group(['prefix'=>'categories'], function(){
		Route::get('new', 'categoryController@new');
		Route::post('new', 'categoryController@save');
		Route::get('{categoryid?}', 'categoryController@index');
		Route::get('edit/{category}', 'categoryController@edit');
		Route::get('delete/{category}', 'categoryController@delete');
	});

	Route::group(['prefix' => 'pages'], function(){

		Route::get('new', 'PageController@new');
		Route::post('new', 'PageController@save');
		Route::get('{pagesid?}', 'PageController@index');
		Route::get('edit/{page}', 'PageController@edit');
		Route::get('delete/{page}', 'PageController@delete');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('new', 'ProductController@new');
		Route::post('new', 'ProductController@save');
		Route::get('{productid?}', 'ProductController@index');
		Route::get('edit/{product}', 'ProductController@edit');
		Route::get('delete/{product}', 'ProductController@delete');
		Route::get('newImage/{product}', 'ProductController@newImage');
		Route::post('newImage', 'ProductController@saveImage');
		Route::get('indexImage/{product}', 'ProductController@imageIndex');
		Route::get('imageDelete/{productImage}', 'ProductController@imageDelete');

	});
	/*Route::group(['prefix' => 'messages'], function(){
		Route::get('new', 'MessageController@new');
		Route::post('new', 'MessageController@save');
		Route::get('{messageid?}', 'MessageController@index');
		Route::get('delete/{message}', 'MessageController@delete');

	});*/

});
Route::post('/mail','PageController@mailGonder');
Route::get('/katalog/{slug}', 'PageController@viewCatalog');
Route::get('/urun/{slug}', 'PageController@viewProduct');
Route::get('/iletisim', 'PageController@viewContact');
Route::get('/{slug}', 'PageController@viewPage');
Route::get('/', 'PageController@viewHomePage');
