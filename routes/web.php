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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/measurement','MeasurementController@displayUnits')->name('measurement');
Route::get('/unit','MeasurementController@addUnit')->name('addUnit');
Route::get('/convert/{id}','MeasurementController@convertView')->name('convertView');
Route::get('/edit/{id}','MeasurementController@editUnit')->name('editUnit');
Route::get('/delete/{id}','MeasurementController@deleteUnit')->name('deleteUnit');
Route::post('/add-unit','MeasurementController@saveUnit')->name('saveUnit');
Route::post('/update-unit','MeasurementController@updateUnit')->name('updateUnit');
Route::post('/convert','MeasurementController@convertUnit')->name('convertUnit');



