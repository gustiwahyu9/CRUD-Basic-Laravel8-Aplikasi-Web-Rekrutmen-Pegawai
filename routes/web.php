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

Route::get('/rekrutmen', function () {
    return view('welcome');
});
Route::get('/pengumuman', function () {
    return view('pengumuman');
});
Route::get('/pengumuman', 'UsersController@pengumuman');

Route::get('/users/register', 'UsersController@reg');
Route::post('/users/register', 'UsersController@register');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/proseslogin', 'AuthController@proseslogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/admin/datausers', 'AdminController@index');
    Route::post('/admin/create', 'AdminController@create');
    Route::post('/admin/biodata/create', 'AdminController@biodatacreate');
    Route::get('/admin/{id}/detail', 'AdminController@detail');


    Route::get('/admin/{id}/diterima', 'AdminController@diterima');
    Route::get('/admin/{id}/ditolak', 'AdminController@ditolak');
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {

    Route::get('/pelamar/biodata', 'UsersController@biodata');
    Route::post('/pelamar/{id}/update', 'UsersController@update');
    Route::get('/pelamar/uploadfile', 'UsersController@biodata2');
    Route::post('/pelamar/{id}/uploadfile', 'UsersController@file');
    Route::get('/pelamar/persetujuan', 'UsersController@biodata3');
    Route::post('/pelamar/{id}/persetujuan', 'UsersController@persetujuan');
    Route::get('/pelamar/final', 'UsersController@final');
});
