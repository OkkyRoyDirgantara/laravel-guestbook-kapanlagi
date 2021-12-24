<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KapanLagiAPIController;
use App\Http\Controllers\Api\GuestBookController;

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

Route::get('/provinces', [KapanLagiAPIController::class, 'getProvinces']);
Route::get('/cities', [KapanLagiAPIController::class, 'getCities']);

Route::resource('guestbook', GuestBookController::class)->only(['index', 'show', 'store']);


