<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Properties;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('', Properties::class);
Route::resource('admin/properties', Properties::class);
Route::get('admin/propertie/destroy/{id}', [Properties::class,'destroy'])->name('destroy');
