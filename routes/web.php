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

Route::get('/','PageController@index')->name('page.show');
Route::post('/page/news/cariberita','PageController@cari')->name('page.cr_berita');
Route::get('/page/news/{id}','PageController@show')->name('page.show_news');
Route::post('/page/news/{id}','PageController@update')->name('page.komentar_news');
Route::get('/page/list/{id}','PageController@list')->name('page.list_news');





Route::group(['middleware'=>'auth'],function(){
	Route::get('/admin','AdminController@index')->name('admin');
	Route::get('/admin/kategori','KategoriController@index')->name('admin.kategori');
	Route::post('/admin/kategori','KategoriController@store')->name('admin.do_ketagori');
	Route::get('/admin/kategori/hapus/{id}','KategoriController@destroy')->name('admin.hapus_kategori');
	Route::post('/admin/kategori/cari','KategoriController@search')->name('admin.carikategori');
	Route::get('/admin/kategori/edit/{id}','KategoriController@edit')->name('admin.edit_kategori');
	Route::post('/admin/kategori/edit/{id}','KategoriController@update')->name('admin.do_edit_kategori');
	Route::get('/admin/berita','BeritaController@index')->name('admin.berita');
	Route::get('/admin/tambah_berita','BeritaController@create')->name('admin.tambahberita');
	Route::post('/admin/tambah_berita','BeritaController@store')->name('admin.tambahberita');
	Route::get('/admin/detail_berita/{id}','BeritaController@show')->name('admin.detail_berita');
	Route::get('/admin/edit_berita/{id}','BeritaController@edit')->name('admin.edit_berita');
	Route::post('/admin/edit_berita/{id}','BeritaController@update')->name('admin.edit_berita');
	Route::get('/admin/hapus_berita/{id}','BeritaController@destroy')->name('admin.hapus_berita');
	Route::get('/admin/berita/cari','BeritaController@cari')->name('admin.cari_berita');
	Route::get('/admin/about','AboutController@index')->name('admin.about');
	Route::post('/admin/about/edit/{id}','AboutController@update')->name('admin.edit_about');
	Route::get('/komentar','KomentarController@index')->name('admin.komen');
	Route::get('/admin/detail_komen/{id}','KomentarController@show')->name('admin.edit_komen');
	Route::post('/admin/edit_komen/{id}','KomentarController@update')->name('admin.do_editkomen');
	Route::get('/admin/hapus_komen/{id}','KomentarController@destroy')->name('admin.hapus_komen');
});

Route::get('/logout','LoginController@logout')->name('admin.logout');
Route::get('/ed-admin','LoginController@index')->name('admin.login');
Route::post('/ed-admin','LoginController@do_login')->name('login');
