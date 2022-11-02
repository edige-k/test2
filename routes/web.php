<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\BusinessController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/businesses', BusinessController::class);
});
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function (){
    Route::get('/', [IndexController::class, 'client'])->name('index');
});
Route::middleware(['auth', 'role:business'])->name('business.')->prefix('business')->group(function (){
    Route::get('/', [IndexController::class, 'business'])->name('index');
});

require __DIR__.'/auth.php';
