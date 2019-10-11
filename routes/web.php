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

Route::get('/', 'HomeController@index');

//Halaman Kursus, Cari dan Kategori Filter
Route::get('/kursus', 'KursusController@index');

Route::get('/kursus/tes', 'KursusController@indexTes');

Route::get('/loadmore', 'LoadMoreController@index');
Route::post('/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');

Route::match(['get','post'], '/kategori/{id}/{slug}', 'KategoriController@detail');
Route::match(['get','post'], '/search', 'KursusController@search');
Route::match(['get','post'], '/kursus/gratis', 'KursusController@gratis');
Route::match(['get','post'], '/kursus/berbayar', 'KursusController@berbayar');
Route::match(['get','post'], '/kursus/popular', 'KursusController@popular');

// Halaman Tentag dan Kontak
Route::get('/kontak', 'KursusController@kontak');
Route::get('/tentang', 'KursusController@tentang');

//Halaman Materi dan Video
Route::match(['get','post'], '/materi/{id}/{slug}', 'MateriController@detail')->middleware('user');
Route::match(['get','post'], '/materi/{id_materi}/{slug_materi}/video/{id}/{slug}', 'VideoController@index')->middleware('auth', 'user');

//Halaman Profile dan Profile Setting
Route::match(['get','post'], '/profile', 'ProfileController@profile')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/setting', 'ProfileController@edit')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/history', 'ProfileController@history')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/history/{invoice}', 'ProfileController@historyView')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/history/{invoice}/confirm', 'ProfileController@historyConfirm')->middleware('auth', 'user');
Route::match(['get','post'], '/profile/history/confirm/success', 'ProfileController@historyConfirmSuccess')->middleware('auth', 'user');

//Halaman Login, Logout dan Register
Route::match(['get','post'],'/login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::match(['get','post'], '/daftar' , 'LoginController@register');
Route::match(['get','post'], '/logout' , 'LoginController@logout')->middleware('auth');

//Halaman Admin
Route::match(['get','post'], 'admin', 'AdminController@index')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/search', 'AdminController@search')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/search/materi', 'AdminController@searchMateri')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/search/video', 'AdminController@searchVideo')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/search/user', 'AdminController@searchUser')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/transaksi', 'AdminController@notifications')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/transaksi/{invoice}', 'AdminController@notificationsView')->middleware('auth', 'admin');

Route::match(['get','post'], 'admin/user', 'AdminController@user')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/user/add', 'AdminController@userAdd')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/user/{id}/{slug}', 'AdminController@userView')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/user/edit/{id}/{slug}', 'AdminController@userEdit')->middleware('auth', 'admin');

Route::match(['get','post'], 'admin/materi', 'AdminController@materi')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/materi/add', 'AdminController@materiAdd')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/materi/edit/{id}/{slug}', 'AdminController@materiEdit')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/materi/view/{id}/{slug}', 'AdminController@materiView')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/materi/del/{id}/{slug}', 'AdminController@materiDelete')->middleware('auth', 'admin');

Route::match(['get','post'], 'admin/kategori', 'AdminController@kategori')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/kategori/del/{id}/{slug}', 'AdminController@kategoriDel')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/kategori/edit/{id}/{slug}', 'AdminController@kategoriEdit')->middleware('auth', 'admin');

Route::match(['get','post'], 'admin/video', 'AdminController@video')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/video/add', 'AdminController@videoAdd')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/video/add/{id}/{slug}', 'AdminController@videoAddMateri')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/video/edit/{id}/{slug}', 'AdminController@videoEdit')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/video/del/{id}/{slug}', 'AdminController@videoDel')->middleware('auth', 'admin');
Route::match(['get','post'], 'admin/video/view/{id}/{slug}', 'AdminController@videoView')->middleware('auth', 'admin');

Route::match(['get','post'], 'admin/setting', 'AdminController@setting')->middleware('auth', 'admin');