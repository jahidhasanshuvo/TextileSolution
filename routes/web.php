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
    return view('admin_layout');
});


///////////////////Buyer Controller////////////////////////

Route::get('/all_buyer','BuyerController@all_buyer')->name('all_buyer');
Route::get('/ajax_buyer','BuyerController@ajax_buyer')->name('ajax_buyer');
Route::get('/add_buyer','BuyerController@add_buyer')->name('add_buyer');
Route::post('/save_buyer','BuyerController@save_buyer')->name('save_buyer');
Route::get('/edit_buyer/{id}','BuyerController@edit_buyer')->name('edit_buyer');
Route::post('/update_buyer/{id}','BuyerController@update_buyer')->name('update_buyer');
Route::get('/delete_buyer/{id}','BuyerController@delete_buyer')->name('delete_buyer');