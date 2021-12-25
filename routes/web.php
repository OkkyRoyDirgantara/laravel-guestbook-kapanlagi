<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\GuestBookFrontEndController;

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

Route::resource('guest', GuestBookFrontEndController::class)->only(['index', 'store']);
Route::get('/', function () {
    return redirect('guest');
})->name('home');

Route::get("/login", function () {return redirect('guest');})->name('login');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::resource('admin/guestbook', GuestBookController::class)->only(['index', 'store', 'destroy', 'show', 'edit', 'create']);
});

Route::get('/home', function (){
    return redirect('admin/guestbook');
})->name('home');
