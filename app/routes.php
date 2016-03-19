<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('home', function()
{
	return View::make('layout.pln');
});

Route::get('datatables', function()
{
	return View::make('dashboard.cekpesanan');
});

//login
Route::get('loginpage', array('as' => 'login', 'uses' =>'LoginController@getLogin'));
Route::get('logout', array('as' => 'logout', 'uses' =>'LoginController@getLogout'));
Route::post('post-login', array('as' => 'post-login', 'uses' =>'LoginController@postLogin'));


//dashboard pln
Route::group(array('before'=>'auth'), function()
{
Route::get('/', array('as' => 'dashboard-pln', 'uses' =>'DashboardController@getIndex'));
Route::get('dashboard', array('as' => 'dashboard-pln', 'uses' =>'DashboardController@getIndex'));
Route::get('manajemen-user', array('as' => 'manajemen-user', 'uses' =>'DashboardController@getManajemenUser'));
Route::get('daftarpesanan', array('as' => 'daftarpesanan', 'uses' =>'DashboardController@getDaftarpesanan'));
Route::get('pesananbaru', array('as' => 'pesananbaru', 'uses' =>'DashboardController@getPesananbaru'));
Route::get('review-pesanan/{id}', array('as' => 'review-pesanan', 'uses' =>'DashboardController@getReviewPesanan'));
Route::get('terima-pesanan/{id}', array('as' => 'terima-pesanan', 'uses' =>'DashboardController@getTerimaPesanan'));
Route::get('form-penolakan/{id}', array('as' => 'form-penolakan', 'uses' =>'DashboardController@getFormPenolakan'));
Route::get('form-penerimaan/{id}', array('as' => 'form-penerimaan', 'uses' =>'DashboardController@getFormPenerimaan'));
Route::post('tolak-pesanan', array('as' => 'tolak-pesanan', 'uses' =>'DashboardController@postPenolakan'));
Route::post('terima-pesanan', array('as' => 'upload-syarat', 'uses' =>'DashboardController@postPenerimaan'));
Route::get('detail-pesanan-user/{id}', array('as' => 'detail-pesanan-user', 'uses' =>'DashboardController@getDetailPesanan'));

//manajemen user
Route::get('tambahuser', array('as' => 'tambah-user', 'uses' =>'DashboardController@getTambahUser'));

Route::post('simpan-user', array('as' => 'simpan-user', 'uses' =>'DashboardController@postSimpanUser'));
Route::get('edit-user/{id}', array('as' => 'edit-user', 'uses' =>'DashboardController@getEditUser'));
Route::post('update-user', array('as' => 'update-user', 'uses' =>'DashboardController@postUpdateUser'));
Route::get('delete-user/{id}', array('as' => 'delete-user', 'uses' =>'DashboardController@getDeleteUser'));

//dashboard user
Route::get('dashboard-user', array('as' => 'dashboard-user', 'uses' =>'UserController@getIndex'));
Route::get('pesanansaya', array('as' => 'pesanan-saya', 'uses' =>'UserController@getPesanan'));
Route::get('form-pemesanan', array('as' => 'tambah-pesanan', 'uses' =>'UserController@getTambahPesanan'));
Route::post('konfirmasipesanan', array('as' => 'konfirmasi-pesanan', 'uses' =>'UserController@postKonfirmasiPesanan'));
Route::post('simpan-pesanan', array('as' => 'simpan-pesanan', 'uses' =>'UserController@postSimpanPesanan'));
Route::get('detail-pesanan/{id}', array('as' => 'detail-pesanan', 'uses' =>'UserController@getDetailPesanan'));



//gardu
Route::get('daftar_gardu', array('as' => 'daftar-gardu', 'uses' =>'GarduController@getIndex'));
Route::get('import', array('as' => 'import-file', 'uses' =>'GarduController@getImport'));
Route::get('import-desa', array('as' => 'import-desa', 'uses' =>'GarduController@getImportDesa'));

//pencarian gardu
Route::post('cari-kecamatan', array('as' => 'cari-kecamatan', 'uses' =>'GarduController@postCariKecamatan'));
Route::post('cari-desa', array('as' => 'cari-desa', 'uses' =>'GarduController@postCariDesa'));
Route::post('cari-gardu', array('as' => 'cari-gardu', 'uses' =>'GarduController@postCariGardu'));

Route::get('menu', array('as' => 'menu', 'uses' =>'DashboardController@getMenu'));
});

