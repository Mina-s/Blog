<?php

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

Route::get('/', function () {
    return view('index');
});

//user

Auth::routes();
Route::get('/inscription', 'Auth\RegisterController@inscription')->name('inscription');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/show','UserController@show')->name('user.show');


//billet 
Route::get('/billet/new', 'PostController@new')->name('billet.new');
Route::post('billet/store', 'PostController@store')->name('billet.store');

Route::get('billet/list','PostController@list')->name('billet.list');
Route::get('billet/{id}/show','PostController@show')->name('billet.show');
Route::get('billet/{id}/mesbillet','PostController@mesbillet')->name('billet.mesbillet');
Route::get('billet/{id}/edit', 'PostController@edit')->name('billet.edit');
Route::post('billet/{id}/update', 'PostController@update')->name('billet.update');
Route::post('billet/{id}/destroy', 'PostController@destroy')->name('billet.destroy');
//tag
Route::get('/tag{slug}','PostController@tag')->name('posts.tag');

//comment

Route::post('/comment/{id}/store','CommentsController@store')->name('comment.store');

//admin

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin','AdminController@index')->name('admin.dashboard');
Route::get('/admin/users','AdminController@showUser')->name('admin.users');
Route::get('/admin/billets','AdminController@showBillet')->name('admin.billets');
Route::get('/admin/comments','AdminController@showComment')->name('admin.comments');

