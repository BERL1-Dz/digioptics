<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FactureController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/patient', [PatientController::class, 'index'] )->middleware(['auth'])->name('patient');
Route::get('/devis', [DevisController::class, 'index'] )->middleware(['auth'])->name('devis');
Route::get('/facture', [FactureController::class, 'index'] )->middleware(['auth'])->name('facture');


require __DIR__.'/auth.php';
