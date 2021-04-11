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

Route::post('/instructions', 'App\Http\Controllers\RoversController@instructions');

Route::get('/', 'App\Http\Controllers\RoversController@index')->where('any', '.*');


