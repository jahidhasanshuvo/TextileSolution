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

Route::resource('/units','UnitController');
Route::resource('/colors','ColorController');
Route::resource('working_items','WorkingItemController',["except"=>["show"]]);
Route::resource('/sizes','SizeController');


Route::resource('/buyers','BuyerController');
Route::resource('/suppliers','SupplierController');
Route::get('/active_supplier/{id}','SupplierController@active_supplier')->name('suppliers.active_supplier');
Route::get('/inactive_supplier/{id}','SupplierController@inactive_supplier')->name('suppliers.inactive_supplier');


Route::resource('order/{oid}/styles','StyleController');
Route::resource('style/{sid}/size_colors','ColorStyleSizeController');
Route::resource('style/{sid}/work_plans','WorkPlanController');
Route::resource('orders','OrderController');
Route::resource('style/{sid}/accessories','AccessoryController');



Route::get('/error','AdminController@error')->name('error');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/dashboard','AdminController@showDashboard')->name('dashboard')->middleware('CheckUser');
Route::post('/login','AdminController@login')->name('login');
Route::get('/logout','AdminController@logout')->name('logout');
Route::get('/add_admin','AdminController@add_admin')->name('add_admin')->middleware('CheckAdmin');
Route::post('/save_admin','AdminController@save_admin')->name('save_admin')->middleware('CheckAdmin');
Route::get('/all_admin','AdminController@all_admin')->name('all_admin')->middleware('CheckAdmin');
Route::get('/delete_admin/{id}','AdminController@delete_admin')->name('delete_admin')->middleware('CheckAdmin');
Route::get('/edit_admin/{id}','AdminController@edit_admin')->name('edit_admin')->middleware('CheckAdmin');
Route::post('/update_admin/{id}','AdminController@update_admin')->name('update_admin')->middleware('CheckAdmin');
Route::get('/edit_password/{id}','AdminController@edit_password')->name('edit_password')->middleware('CheckAdmin');
Route::post('/update_password/{id}','AdminController@update_password')->name('update_password')->middleware('CheckAdmin');

