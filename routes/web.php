<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

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
Route::GET('/products/update/save-update/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');

//user profil update
Route::get('/profile', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
Route::post('password/update', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

