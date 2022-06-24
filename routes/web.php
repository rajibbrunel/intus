<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [App\Http\Controllers\LinkController::class, 'create'])->name('create_view'); 

Route::get('/{hash}', [App\Http\Controllers\LinkController::class,'show'])->name('show'); 

Route::get('/something/{hash}', [App\Http\Controllers\LinkController::class, 'show'])->name('somelink'); 

