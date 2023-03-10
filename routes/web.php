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

Route::get('/', 'Main@index');

Route::post('/display', 'Main@display');

Route::post('/insert', 'Main@insert');

Route::post('/update', 'Main@update');

Route::post('/delete', 'Main@delete');
