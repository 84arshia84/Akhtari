<?php

use App\Http\Controllers\Auth\AddProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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

Route::prefix('users')->middleware('auth:sanctum')->group(function () {
    Route::delete('delete_user/{id}', [UserController::class, 'delete_user'])->middleware('permission:user.delete')->name('delete_user');
    Route::get('all_users', [UserController::class, 'all_users'])->middleware('permission:users.all')->name('all_users');
    Route::post('find_user', [UserController::class, 'find_user'])->middleware('permission:user.find')->name('find_user');
    Route::put('update_user/{id}', [UserController::class, 'update_user'])->middleware('permission:user.update')->name('update_user');
    Route::post('add_user',[UserController::class,'add_user'])->middleware('permission:user.add')->name('add_user');

});
Route::prefix('auth')->group(function (){
Route::post('register_user', [RegisterController::class, 'register_user'])->middleware('permission:register_user')->name('register_user');
Route::post('login', LoginController::class)->middleware('permission:login')->name('login');
Route::post('logout', LogoutController::class)->name('logout')->middleware(['auth:sanctum','permission:logout']);

});

Route::prefix('product')->group(function (){
Route::post('add_product',[ProductController::class,'add_product'])->middleware('permission:product.add')->name('add_product');
Route::delete('delete_product/{id}',[ProductController::class,'delete_product'])->middleware('permission:product.delete')->name('delete_product');
Route::post('all_product',[ProductController::class,'all_product'])->middleware('permission:product.all')->name('all_product');
Route::post('find_product',[ProductController::class,'find_product'])->middleware('permission:product.find')->name('find_product');
Route::put('update_product/{id}',[ProductController::class,'update_product'])->middleware('permission:product.update')->name('update_product');
});

Route::prefix('order')->group(function (){
Route::post('add_order',[OrderController::class,'add_order'])->middleware('permission:order.add')->name('add_order');
Route::get('all_order',[OrderController::class,'all_order'])->middleware('permission:order.all')->name('all_order');
Route::delete('delete_order',[OrderController::class,'delete_order'])->middleware('permission:order.delete')->name('delete_order');
Route::post('find_order',[OrderController::class,'find_order'])->middleware('permission:order.find')->name('find_order');
});

Route::prefix('roles')->group(function (){
    Route::get('all_roles',[RoleController::class, 'all_roles'])->middleware('permission:roles.all')->name('all_roles');
    Route::post('add_roles',[RoleController::class, 'add_roles'])->middleware('permission:roles.add')->name('add_roles');
//    Route::get('getAssignRole',[RoleController::class,'getAssignRole'])->name('getAssignRole');
    Route::post('postAssignRole',[RoleController::class,'postAssignRole'])->middleware('permission:postAssignRole')->name('postAssignRole');
//    Route::post('userAssignRole/{id}',[RoleController::class,'userAssignRole'])->name('userAssignRole');
});

Route::prefix('permissions')->group(function (){
    Route::get('all_permission',[RoleController::class, 'all_permission'])->middleware('permission:permission.all')->name('all_permission');
    Route::post('add_permissions',[RoleController::class, 'add_permissions'])->middleware('permission:permissions.add')->name('add_permissions');

});

Route::prefix('factor')->group(function (){
Route::post('add_Factor', [FactorController::class, 'add_Factor'])->middleware('permission:factor.add')->name('add_Factor');
Route::get('all_factor', [FactorController::class, 'all_factor'])->middleware('permission:factor.all')->name('all_factor');
Route::get('find_factor', [FactorController::class, 'find_factor'])->middleware('permission:factor_show')->name('find_factor');
Route::put('update_factor', [FactorController::class, 'update_factor'])->middleware('permission:factor.update')->name('update_factor');
Route::delete('delete_Factor', [FactorController::class, 'delete_Factor'])->middleware('permission:factor.delete')->name('delete_Factor');
});
