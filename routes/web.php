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


//////////////////////////Unit Controller //////////////////
Route::resource('/units','UnitController');


///////////////////Color Controller////////////////////////

Route::get('/all_color','ColorController@all_color')->name('all_color');
Route::get('/ajax_color','ColorController@ajax_color')->name('ajax_color');
Route::get('/add_color','ColorController@add_color')->name('add_color');
Route::post('/save_color','ColorController@save_color')->name('save_color');
Route::get('/edit_color/{id}','ColorController@edit_color')->name('edit_color');
Route::post('/update_color/{id}','ColorController@update_color')->name('update_color');
Route::get('/delete_color/{id}','ColorController@delete_color')->name('delete_color');

///////////////////Size Controller////////////////////////

Route::get('/all_size','SizeController@all_size')->name('all_size');
Route::get('/ajax_size','SizeController@ajax_size')->name('ajax_size');
Route::get('/add_size','SizeController@add_size')->name('add_size');
Route::post('/save_size','SizeController@save_size')->name('save_size');
Route::get('/edit_size/{id}','SizeController@edit_size')->name('edit_size');
Route::post('/update_size/{id}','SizeController@update_size')->name('update_size');
Route::get('/delete_size/{id}','SizeController@delete_size')->name('delete_size');


//////////////////////// SizeColor Controller/////////////////

Route::resource('style/{sid}/size_colors','ColorStyleSizeController');

//////////////////////// WorkPlan Controller/////////////////

Route::resource('style/{sid}/work_plans','WorkPlanController');


//////////////////Order Controller ////////////////////////
Route::get('/all_order','OrderController@all_order')->name('all_order');
Route::get('/ajaxOrder','OrderController@ajaxOrder')->name('ajaxOrder');
Route::get('/add_order','OrderController@add_order')->name('add_order');
Route::post('/save_order','OrderController@save_order')->name('save_order');
Route::get('/edit_order/{id}','OrderController@edit_order')->name('edit_order');
Route::post('/update_order/{id}','OrderController@update_order')->name('update_order');
Route::get('/order_details/{id}','OrderController@order_details')->name('order_details');


//////////////////////////Style Controller ///////////////////
Route::resource('order/{oid}/styles','StyleController');


//////////////////////Supplier Controller /////////////////
Route::resource('/suppliers','SupplierController');
Route::get('/active_supplier/{id}','SupplierController@active_supplier')->name('suppliers.active_supplier');
Route::get('/inactive_supplier/{id}','SupplierController@inactive_supplier')->name('suppliers.inactive_supplier');


//////////////////////////Accessory Controller ///////////////////
Route::resource('style/{sid}/accessories','AccessoryController');

////////////Admin Controller///////////////////////////////////
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


//////////////////Working Items Controller//////////////////
Route::resource('working_items','WorkingItemController',["except"=>["show"]]);