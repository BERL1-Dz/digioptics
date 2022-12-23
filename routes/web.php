<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MontureController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\VerreController;

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
Route::get('/correction', [CorrectionController::class, 'index'] )->middleware(['auth'])->name('correction');
Route::get('/fournisseur', [FournisseurController::class, 'index'] )->middleware(['auth'])->name('fournisseur');
Route::get('/verre', [VerreController::class, 'index'] )->middleware(['auth'])->name('verre');
Route::get('/monture', [MontureController::class, 'index'] )->middleware(['auth'])->name('monture');

//facture
Route::get('/facture', [FactureController::class, 'index'] )->middleware(['auth'])->name('index');
Route::get('/factureEdit/{id}', [FactureController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::get('/factureShow/{id}', [FactureController::class, 'show'] )->middleware(['auth'])->name('show');
Route::put('/facture/update/{id}', [FactureController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/facture/delete/{id}', [FactureController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

//patient
Route::get('/patientEdit/{id}', [PatientController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/patient/update/{id}', [PatientController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/patient/delete/{id}', [PatientController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

// fournisseur
Route::get('/fournisseurEdit/{id}', [FournisseurController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/fournisseur/delete/{id}', [FournisseurController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

// verre
Route::get('/verreEdit/{id}', [VerreController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/verre/update/{id}', [VerreController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/verre/delete/{id}', [VerreController::class, 'destroy'] )->middleware(['auth'])->name('update');


//resource

Route::post('/create',[FactureController::class, 'store']);
Route::post('/create_patient',[PatientController::class, 'store']);
Route::post('/create_fournisseur',[FournisseurController::class, 'store']);
Route::post('/create_verre',[VerreController::class, 'store']);
//Route::post('/create_monture',[Montu::class, 'store']);
Route::post('/create_correction',[CorrectionController::class, 'vision_p']);

require __DIR__.'/auth.php';
