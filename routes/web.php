<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MontureController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\LentilleController;
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


// devis
Route::get('/devis', [DevisController::class, 'index'] )->middleware(['auth'])->name('devis');

//baki is a cunt !
// lenttile
Route::get('/lenttile', [LentilleController::class, 'index'] )->middleware(['auth'])->name('lenttile');
Route::post('/create_lenttile',[LentilleController::class,'store']);
Route::get('/lenttileEdit/{id}', [LentilleController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/lenttile/update/{id}', [LentilleController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/lenttile/delete/{id}', [LentilleController::class, 'destroy'] )->middleware(['auth'])->name('destroy');



// monture
Route::post('/create_monture',[MontureController::class,'store']);
Route::get('/monture', [MontureController::class, 'index'] )->middleware(['auth'])->name('monture');
Route::get('/montureEdit/{id}', [MontureController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/monture/update/{id}', [MontureController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/monture/delete/{id}', [MontureController::class, 'destroy'] )->middleware(['auth'])->name('destroy');





// correction
Route::get('/correction', [CorrectionController::class, 'index'] )->middleware(['auth'])->name('correction');
Route::get('/correctionShow/{id}', [CorrectionController::class, 'show'] )->middleware(['auth'])->name('show');
Route::post('/correction_pres',[CorrectionController::class, 'vision_p']);
Route::post('/correction_loin',[CorrectionController::class, 'vision_l']);


//facture
Route::post('/create',[FactureController::class, 'store']);
Route::get('/facture', [FactureController::class, 'index'] )->middleware(['auth'])->name('index');
Route::get('/factureEdit/{id}', [FactureController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::get('/factureShow/{id}', [FactureController::class, 'show'] )->middleware(['auth'])->name('show');
Route::put('/facture/update/{id}', [FactureController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/facture/delete/{id}', [FactureController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

//patient
Route::post('/create_patient',[PatientController::class, 'store']);
Route::get('/patient', [PatientController::class, 'index'] )->middleware(['auth'])->name('patient');
Route::get('/patientEdit/{id}', [PatientController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/patient/update/{id}', [PatientController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/patient/delete/{id}', [PatientController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

// fournisseur
Route::get('/fournisseur', [FournisseurController::class, 'index'] )->middleware(['auth'])->name('fournisseur');
Route::post('/create_fournisseur',[FournisseurController::class, 'store']);
Route::get('/fournisseurEdit/{id}', [FournisseurController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/fournisseur/delete/{id}', [FournisseurController::class, 'destroy'] )->middleware(['auth'])->name('destroy');

// verre

Route::get('/verre', [VerreController::class, 'index'] )->middleware(['auth'])->name('verre');
Route::post('/create_verre',[VerreController::class, 'store']);
Route::get('/verreEdit/{id}', [VerreController::class, 'edit'] )->middleware(['auth'])->name('edit');
Route::put('/verre/update/{id}', [VerreController::class, 'update'] )->middleware(['auth'])->name('update');
Route::get('/verre/delete/{id}', [VerreController::class, 'destroy'] )->middleware(['auth'])->name('update');


require __DIR__.'/auth.php';
