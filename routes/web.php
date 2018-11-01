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

Route::get('/','Auth\LoginController@showLoginForm');
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', function () {
        return view('admin_layout');
    })->name('dashboard');

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


    Route::resource('/users','UserController')->only('index','edit','update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
