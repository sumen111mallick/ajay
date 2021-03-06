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

/***********************
 Item detail
 ***********************/
Route::resource('item','ItemController');
Route::post('itemlist','ItemController@itemList');

/***********************
 Invoice detail
 ***********************/
Route::resource('invoice','InvoiceController');
Route::post('invoicelist','InvoiceController@invoiceList');

/***********************
 Invoice Generation
 ***********************/
Route::post('invoicevendorlist','InvoiceController@invoiceVendorList');
Route::post('invoicebilledlist','InvoiceController@invoiceBilledList');
Route::post('invoiceshippedlist','InvoiceController@invoiceShippedList');
Route::post('invoicevehiclemodelist','InvoiceController@invoiceVehicleModeList');
Route::post('invoicevehiclelist','InvoiceController@invoiceVehicleList');
Route::post('invoiceitemlist','InvoiceController@invoiceItemList');
Route::post('generateinvoice','InvoiceController@generateInvoice');




