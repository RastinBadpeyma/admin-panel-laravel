<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/users/{user}/permissions',[\App\Http\Controllers\Admin\User\PermissionController::class,'create'])->name('users.permissions');
Route::post('/users/{user}/permissions',[\App\Http\Controllers\Admin\User\PermissionController::class,'store'])->name('users.permissions.store');



Route::resource('users',UserController::class);
Route::resource('permissions',PermissionController::class);
Route::resource('roles',RoleController::class);
Route::resource('products' ,\App\Http\Controllers\Admin\ProductConroller::class);


