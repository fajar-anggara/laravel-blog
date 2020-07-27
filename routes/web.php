<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', 'BlogController@index')->name('dashboard');
route::post('admin/', 'userController@input');
route::get('admin/', function() {
	if (session('role')) {
		return redirect('admin/report');
	} else {
		return view('admin.lorefail');
	}
});
route::get('/logout', 'userController@logout')->name('logout');

route::prefix('admin')->group(function() {

	route::middleware([admin::class])->group(function() {
		route::post('user', 'userController@store')->name('add.user');
		route::delete('user/{id}', 'userController@destroy');
		route::get('user', 'userController@create');
		route::get('user/{id}', 'userController@edit');

		route::post('menu', 'menuController@store')->name('add.menu');
		route::put('menu/{id}', 'menuController@update');
		route::delete('menu/{id}', 'menuController@destroy');
		route::get('menu', 'menuController@index');
	});

	route::middleware([editor::class])->group(function() {
		route::put('user/{id}', 'userController@update');
		route::get('profile/{id}', 'userController@edit');
		route::get('report', 'blogController@report');

		route::post('message', 'userController@message')->name('add.message');
		route::get('message/{type}/{myid}/{id}', 'userController@message');
		route::get('message', 'userController@message')->name('message');

		route::post('post', 'blogController@store')->name('add.post');
		route::put('post/{id}', 'blogController@update');
		route::delete('post/{id}', 'blogController@destroy');
		route::get('post', 'blogController@create');
		route::get('post/{id}', 'blogController@edit');

		route::post('categories', 'categorieController@store')->name('add.categori');
		route::put('categories/{id}', 'categorieController@update');
		route::delete('categories/{id}', 'categorieController@destroy');
		route::get('categories', 'categorieController@create');
	});

});

route::prefix('blog')->group(function() {
	route::post('search', 'categorieController@search')->name('search');
	route::get('search', 'categorieController@search');
	route::get('search/{tags}', 'categorieController@search');
	route::get('categories/{param}', 'categorieController@index');
	route::get('{param}', 'blogController@show');
});

route::prefix('about')->group(function() {
	route::get('web', function() {
		return view('about.web');
	})->name('about.web');

	route::get('contact', function() {
		return view('about.contact');
	})->name('about.contact');

	route::get('person/{id}', function($id) {
		$person = \App\user::where('id', $id)->first();
		return view('about.person', (['person' => $person]));
	});

});


route::post('/debug', 'BlogController@debuging')->name('debug');
// route::get('/debug', 'BlogController@debuging')->name('debug');
route::get('/debug', function() {
	return view('debug');
});

