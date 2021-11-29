<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard\AnimalController;
use App\Http\Controllers\Dashboard\PatientController;

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

Route::get('/', [DataController::class , 'index']);

Route::get('/dashboard' , function(){
    return view('dashboard.index');
});

Route::get('/login' , [LoginController::class , 'index'])->name('login');
Route::post('/login' , [LoginController::class , 'authenticate']);
Route::post('/logout' , [LoginController::class , 'logout']);

Route::post('/daftar' , [DataController::class , 'store']);
// Route::resource('/dashboard/pasiens' , PasienController::class)->middleware('auth');
Route::prefix('dashboard')->group(function(){
    Route::resource('/patients', PatientController::class);
    Route::resource('/animals', AnimalController::class);
});

// Route::middleware(['auth'])->prefix('dashboard')->group(function () {
//     Route::resource('patient', PatientController::class);
// });