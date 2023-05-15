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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('patient', App\Http\Controllers\PatientController::class);


Route::resource('service', App\Http\Controllers\ServiceController::class);


Route::resource('type-medicament', App\Http\Controllers\TypeMedicamentController::class);

Route::resource('medicament', App\Http\Controllers\MedicamentController::class);