<?php

use App\Http\Controllers\AcademicDegreeController;
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('grado', AcademicDegreeController::class);
    Route::resource('tipo-sangre', BloodTypeController::class);
    Route::resource('matricula', StudentController::class);
});

