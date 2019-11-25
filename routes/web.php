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
    return view('hello');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'companies'], function(){
    Route::get('', 'CompanyController@index')->name('company.index');
    Route::get('create', 'CompanyController@create')->name('company.create');
    Route::post('store', 'CompanyController@store')->name('company.store');
    Route::get('edit/{company}', 'CompanyController@edit')->name('company.edit');
    Route::post('update/{company}', 'CompanyController@update')->name('company.update');
    Route::post('delete/{company}', 'CompanyController@destroy')->name('company.destroy');
    Route::get('show/{company}', 'CompanyController@show')->name('company.show');
 });

 Route::group(['prefix' => 'customers'], function(){
    Route::get('', 'CustomerController@index')->name('customer.index');
    Route::get('create', 'CustomerController@create')->name('customer.create');
    Route::post('store', 'CustomerController@store')->name('customer.store');
    Route::get('edit/{customer}', 'CustomerController@edit')->name('customer.edit');
    Route::post('update/{customer}', 'CustomerController@update')->name('customer.update');
    Route::post('delete/{customer}', 'CustomerController@destroy')->name('customer.destroy');
    Route::get('show/{customer}', 'CustomerController@show')->name('customer.show');
 });
 

 
