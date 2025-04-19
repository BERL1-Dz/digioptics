<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MontureController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\LentilleController;
use App\Http\Controllers\VerreController;
use App\Http\Controllers\OpticienInfoController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\VentController;
use App\Http\Controllers\RecetteController;

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
Route::get('/devis', [DevisController::class, 'index'])->middleware(['auth'])->name('devis');

// Lentille
Route::get('/lentille', [LentilleController::class, 'index'])->middleware(['auth'])->name('lentille');
Route::post('/create_lentille', [LentilleController::class, 'store']);
Route::get('/lentilleEdit/{id}', [LentilleController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/lentille/update/{id}', [LentilleController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/lentille/delete/{id}', [LentilleController::class, 'destroy'])->middleware(['auth'])->name('destroy');


// monture
Route::post('/create_monture', [MontureController::class, 'store']);
Route::get('/monture', [MontureController::class, 'index'])->middleware(['auth'])->name('monture');
Route::get('/montureEdit/{id}', [MontureController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/monture/update/{id}', [MontureController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/monture/delete/{id}', [MontureController::class, 'destroy'])->middleware(['auth'])->name('destroy');


// correction
Route::get('/correction', [CorrectionController::class, 'index'])->middleware(['auth'])->name('correction.index');
Route::get('/correction/{id}', [CorrectionController::class, 'show'])->middleware(['auth'])->name('correction.show');
Route::get('/correction/{id}/edit', [CorrectionController::class, 'edit'])->middleware(['auth'])->name('correction.edit');
Route::put('/correction/{id}', [CorrectionController::class, 'update'])->middleware(['auth'])->name('correction.update');
Route::delete('/correction/{id}', [CorrectionController::class, 'destroy'])->middleware(['auth'])->name('correction.destroy');
Route::get('/correction/{id}/print', [CorrectionController::class, 'printPDF'])->middleware(['auth'])->name('correction.print');
Route::post('/correction_pres', [CorrectionController::class, 'vision_p'])->name('correction.vision_p');
Route::post('/correction_loin', [CorrectionController::class, 'vision_l'])->name('correction.vision_l');
Route::post('/correction_lentille', [CorrectionController::class, 'lentille'])->name('correction.lentille');


//facture
Route::post('/create', [FactureController::class, 'store']);
Route::get('/factures', [FactureController::class, 'index'])->middleware(['auth'])->name('facture.index');  //
Route::get('/factureEdit/{id}', [FactureController::class, 'edit'])
    ->middleware(['auth'])
    ->name('facture.edit');
Route::get('/factureShow/{id}', [FactureController::class, 'show'])->middleware(['auth'])->name('show');
Route::put('/facture/update/{id}', [FactureController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/facture/delete/{id}', [FactureController::class, 'destroy'])->middleware(['auth'])->name('destroy');
Route::get('/facturePrint/{id}', [FactureController::class, 'print'])
    ->middleware(['auth'])
    ->name('facture.print');

//patient
Route::post('/create_patient', [PatientController::class, 'store']);
Route::get('/patient', [PatientController::class, 'index'])->middleware(['auth'])->name('patient');
Route::get('/patientEdit/{id}', [PatientController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/patient/update/{id}', [PatientController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/patient/delete/{id}', [PatientController::class, 'destroy'])->middleware(['auth'])->name('destroy');

// fournisseur
Route::get('/fournisseur', [FournisseurController::class, 'index'])->middleware(['auth'])->name('fournisseur');
Route::post('/create_fournisseur', [FournisseurController::class, 'store']);
Route::get('/fournisseurEdit/{id}', [FournisseurController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/fournisseur/delete/{id}', [FournisseurController::class, 'destroy'])->middleware(['auth'])->name('destroy');

// verre

Route::get('/verre', [VerreController::class, 'index'])->middleware(['auth'])->name('verre');
Route::post('/create_verre', [VerreController::class, 'store']);
Route::get('/verreEdit/{id}', [VerreController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/verre/update/{id}', [VerreController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/verre/delete/{id}', [VerreController::class, 'destroy'])->middleware(['auth'])->name('update');

// categorie

Route::get('/categorie', [CategoryController::class, 'index'])->middleware(['auth'])->name('categorie');
Route::post('/create_categorie', [CategoryController::class, 'store']);

// accessoir

Route::get('/accessoire', [AccessoireController::class, 'index'])->middleware(['auth'])->name('accessoire');
Route::post('/create_accessoire', [AccessoireController::class, 'store']);
Route::get('/accessoireEdit/{id}', [AccessoireController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/accessoire/update/{id}', [AccessoireController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/accessoire/delete/{id}', [AccessoireController::class, 'destroy'])->middleware(['auth'])->name('update');

// opticien info
Route::resource('opticien-info', OpticienInfoController::class)->middleware(['auth']);

// Achat Routes
Route::get('/achat', [AchatController::class, 'index'])->middleware(['auth'])->name('achat.index');
Route::get('/achat/create', [AchatController::class, 'create'])->middleware(['auth'])->name('achat.create');
Route::post('/achat', [AchatController::class, 'store'])->middleware(['auth'])->name('achat.store');
Route::get('/achat/{achat}', [AchatController::class, 'show'])->middleware(['auth'])->name('achat.show');
Route::get('/achat/{achat}/edit', [AchatController::class, 'edit'])->middleware(['auth'])->name('achat.edit');
Route::put('/achat/{achat}', [AchatController::class, 'update'])->middleware(['auth'])->name('achat.update');
Route::delete('/achat/{achat}', [AchatController::class, 'destroy'])->middleware(['auth'])->name('achat.destroy');

// Vent Routes
Route::get('/vent', [VentController::class, 'index'])->name('vent.index');
Route::get('/vent/create', [VentController::class, 'create'])->name('vent.create');
Route::post('/vent', [VentController::class, 'store'])->name('vent.store');
Route::get('/vent/{vent}', [VentController::class, 'show'])->name('vent.show');
Route::get('/vent/{vent}/edit', [VentController::class, 'edit'])->name('vent.edit');
Route::put('/vent/{vent}', [VentController::class, 'update'])->name('vent.update');
Route::delete('/vent/{vent}', [VentController::class, 'destroy'])->name('vent.destroy');
Route::get('/vent/{vent}/pdf', [VentController::class, 'pdf'])->name('vent.pdf');

// Recette Routes
Route::resource('recette', RecetteController::class);
Route::get('recette/{recette}/pdf', [RecetteController::class, 'pdf'])->name('recette.pdf');

require __DIR__ . '/auth.php';
