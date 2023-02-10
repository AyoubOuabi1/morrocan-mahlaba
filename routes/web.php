<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/update-role', [App\Http\Controllers\UserController::class, 'updateRole'])->name('updateRole');
    Route::post('/delete-role', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
});

Auth::routes();


Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/products/create/new', [App\Http\Controllers\ProductController::class, 'store'])->name('saveProduct');
Route::post('/products/delete', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/products/update/{id}', [App\Http\Controllers\ProductController::class, 'selectProduct'])->name('selectProduct');
Route::POST('/products/update/save-update/{id}', [App\Http\Controllers\ProductController::class, 'selectProduct'])->name('updateProduct');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
