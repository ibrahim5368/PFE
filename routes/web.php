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
// user
Route::get('/', function () {
    return view('user.login');
})->name('viewlogin');
Route::get('signup', function () {
    return view('user.signup');
});
Route::post('login', [UserController::class, 'login'])->name('connecter');

Route::post('signup', [UserController::class, 'store'])->name('signup');
//sql
Route::get('/export', [FormController::class, 'export'])->name('export');
Route::get('sqladd', function () {
    return view('layouts.SqlAdd');
})->name('sqlform');
