<?php

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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('layouts.dashboard');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('patient', App\Http\Controllers\PatientController::class);
    Route::resource('service', App\Http\Controllers\ServiceController::class);
    Route::resource('type-medicament', App\Http\Controllers\TypeMedicamentController::class);
    Route::resource('medicament', App\Http\Controllers\MedicamentController::class);
    Route::resource('assignation', App\Http\Controllers\AssignationController::class);
    Route::resource('diagnostic', App\Http\Controllers\DiagnosticController::class);
    Route::resource('prescription', App\Http\Controllers\PrescriptionController::class);
    Route::resource('role', App\Http\Controllers\RoleController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
});
;
