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

//deleteのページの表示
Route::get('/blog/{id}/destroy','BlogController@showDelete')->name('delete');

//お気に入りの一覧
Route::get('/blog/showFavo','BlogController@showFavo')->name('prefer');

//お気に入りの実行
Route::get('/blog/{id}/favorite','BlogController@exeFavorite')->name('favorite');

//お気に入り削除の実行
Route::get('/blog/{id}/unfavo','BlogController@exeUnFavo')->name('unfavo');

//検索の実行
Route::post('/search','BlogController@exeSearch')->name('search');

//Restのresorce
Route::resource('/blog','BlogsController');

//login機能
Auth::routes();
//login機能
Route::get('/home', 'HomeController@index')->name('home');
