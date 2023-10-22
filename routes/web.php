<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Lang\LangController;
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

Route::view('/', 'welcome')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('lang.switch');

Route::post('/login', [AuthController::class, 'authLogin'])->name('auth.login');
Route::post('/register', [AuthController::class, 'authRegister'])->name('auth.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'authLogout'])->name('auth.logout');
});
