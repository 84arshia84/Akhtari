<?php

use App\Http\Controllers\Auth\AddProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('dashboard')->middleware('auth:sanctum')->group(function () {
    Route::delete('delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
    Route::get('all_users', [UserController::class, 'all_users'])->name('all_users');
    Route::post('find_user', [UserController::class, 'find_user'])->name('find_user');
    Route::put('update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::post('add_user',[UserController::class,'add_user'])->name('add_user');
});

Route::post('register_user', [RegisterController::class, 'register_user'])->name('register_user');
Route::post('login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout')->middleware('auth:sanctum');






Route::post('add_product',[ProductController::class,'add_product'])->name('add_product');
Route::delete('delete_product/{id}',[ProductController::class,'delete_product'])->name('delete_product');
Route::post('all_product',[ProductController::class,'all_product'])->name('all_product');
Route::post('find_product',[ProductController::class,'find_product'])->name('find_product');
Route::put('update_product/{id}',[ProductController::class,'update_product'])->name('update_product');










Route::post('add_order',[OrderController::class,'add_order'])->name('add_order');
Route::get('all_order',[OrderController::class,'all_order'])->name('all_order');
Route::delete('delete_order',[OrderController::class,'delete_order'])->name('delete_order');
Route::post('find_order',[OrderController::class,'find_order'])->name('find_order');














