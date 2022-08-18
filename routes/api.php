<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-clinic-treatment/{clinicId}', [TreatmentController::class, 'getClinicTreatment'])->middleware('auth:sanctum');
Route::put('update-clinic-name/{id}', [ClinicController::class, 'updateClinicName'])->middleware('auth:sanctum');
Route::post('add-treatment-doctor', [TreatmentController::class, 'addTreatmentDoctor'])->middleware('auth:sanctum');
Route::post('add-appointment', [UserController::class, 'addAppointment'])->middleware('auth:sanctum');
Route::put('update-appointment-hour', [AppointmentController::class, 'updateAppointment'])->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'apiLogin']);

