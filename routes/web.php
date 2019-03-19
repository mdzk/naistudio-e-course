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

//Halaman Kursus, Cari dan Kategori
Route::get('/kursus', 'KursusController@index');
Route::match(['get','post'], '/kategori/{id}/{slug}', 'KategoriController@detail');

//Halaman Materi dan Video
Route::match(['get','post'], '/materi/{id}/{slug}', 'MateriController@detail')->middleware('user');
Route::match(['get','post'], '/materi/{id_materi}/{slug_materi}/video/{id}/{slug}', 'VideoController@index')->middleware('auth', 'user');

//Halaman Profile dan Profile Setting
Route::match(['get','post'], '/profile', 'ProfileController@profile')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/setting/{id}/{slug}', 'ProfileController@edit')->middleware('auth', 'user');

//Halaman Login, Logout dan Register
Route::match(['get','post'],'/login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::match(['get','post'], '/daftar' , 'LoginController@register');
Route::match(['get','post'], '/logout' , 'LoginController@logout')->middleware('auth');

//Halaman Admin
Route::match(['get','post'],'/admin/home', 'AdminController@index')->middleware('auth', 'admin');

Route::get('admin/1', function () {
    return view('admin.icons');
});

Route::get('admin/2', function () {
    return view('admin.map');
});

Route::get('admin/3', function () {
    return view('admin.notifications');
});

Route::get('admin/4', function () {
    return view('admin.tables');
});

Route::get('admin/5', function () {
    return view('admin.typography');
});

Route::get('admin/6', function () {
    return view('admin.upgrade');
});

Route::get('admin/7', function () {
    return view('admin.user');
});