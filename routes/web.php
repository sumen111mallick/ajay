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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/***********************
 Vendor
 ***********************/
Route::resource('vendor','VendorController');
Route::post('vendorlist','VendorController@vendorList');

/***********************
 Billing
 ***********************/
Route::resource('billing','BillingController');
Route::post('billinglist','BillingController@billingList');

/***********************
 Shipping
 ***********************/
Route::resource('shipping','ShippingController');
Route::post('shippinglist','ShippingController@shippingList');

/***********************
 Vehicle
 ***********************/
Route::resource('vehicle','VehicleController');
Route::post('vehiclelist','VehicleController@vehicleList');

/***********************
 personal detail
 ***********************/
Route::resource('personal','PersonalController');
Route::post('personaldetail','PersonalController@personalDetail');