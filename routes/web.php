<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'login'])->name('nedmin.Login');
Route::post('/login',  [AuthController::class, 'authenticate'])->name('nedmin.Authenticate');
Route::get('/logout',  [AuthController::class, 'logout'])->name('nedmin.Logout');
Route::get('/dashboard', [AuthController::class, 'index'])->name('nedmin.Index')->middleware('auth:sanctum');
