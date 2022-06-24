<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// custom  middleware provided so it can prevent external api call only same server api will work
// sanctum need to go for login to perform right way
Route::middleware('App\Http\Middleware\spa:class')->post('/v1/create', [App\Http\Controllers\LinkController::class, 'store'])->name('create_short_url');
