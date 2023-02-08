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

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

});

Auth::routes();
Route::get('/products', [App\Http\Controllers\Product::class, 'index'])->name('products');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
