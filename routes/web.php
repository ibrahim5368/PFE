<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;


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



////////////////////////auth/////////////////////////
Route::post('register', [UserController::class, 'registerSave'])->name('register.save');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('/', [UserController::class, 'register'])->name('register');
Route::get('logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('sqladd', [UserController::class, 'sqladd'])->name('sqladd');
Route::post('login',[UserController::class,'loginAction'])->name('login.action');
///////////////////////form/////////////////////////////////
Route::controller(FormController::class)->group(function(){
    Route::get('export',  'export')->name('export');
});

