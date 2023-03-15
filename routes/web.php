<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;

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

Auth::routes();


// admin route
Route::group(['middleware' => 'is_admin','prefix'=>"admin"], function () {
    Route::get('home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('getsubcategory', [ServiceController::class, 'getsubcategory'])->name('admin.service.subcategory');
    Route::resource('category', CategoryController::class);
    Route::resource('service', ServiceController::class);



});

// customer route
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
