<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Monture;
use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OpticienInfo;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;

class RecetteController extends Controller
{
    public function index()
    {
        $recettes = Recette::all();
        $montures = Monture::all();
        
        return view('recette.index', compact('recettes', 'montures'));
    }

    public function create()
    {
        $montures = Monture::all();
        $patients = Patient::orderBy('prenom')->get();
        return view('recette.create', compact('montures', 'patients'));
    }

    public function store(Request $request)
    {
        $recettes = new Recette();
        $recettes->patient_id = $request->input('patient_id');
        $recettes->client_nom = $request->input('client_nom');
        $recettes->client_prenom = $request->input('client_prenom');
        $recettes->client_telephone = $request->input('client_telephone');
        $recettes->oeil_droit_sphere = $request->input('oeil_droit_sphere');
        $recettes->oeil_droit_cylindre = $request->input('oeil_droit_cylindre');
        $recettes->oeil_droit_axe = $request->input('oeil_droit_axe');
        $recettes->oeil_gauche_sphere = $request->input('oeil_gauche_sphere');
        $recettes->oeil_gauche_cylindre = $request->input('oeil_gauche_cylindre');
        $recettes->oeil_gauche_axe = $request->input('oeil_gauche_axe');
        $recettes->oeil_droit_sphere_pres = $request->input('oeil_droit_sphere_pres');
        $recettes->oeil_droit_cylindre_pres = $request->input('oeil_droit_cylindre_pres');
        $recettes->oeil_droit_axe_pres = $request->input('oeil_droit_axe_pres');
        $recettes->oeil_gauche_sphere_pres = $request->input('oeil_gauche_sphere_pres');
        $recettes->oeil_gauche_cylindre_pres = $request->input('oeil_gauche_cylindre_pres');
        $recettes->oeil_gauche_axe_pres = $request->input('oeil_gauche_axe_pres');
        $recettes->oeil_gauche_addition = $request->input('oeil_gauche_addition');
        $recettes->type_verre = $request->input('type_verre');
        $recettes->monture_id = $request->input('monture_id');
        $recettes->total = $request->input('total');
        $recettes->montant_paye = $request->input('montant_paye');
        $recettes->notes = $request->input('notes');
        $recettes->monture_price = $request->input('monture_price');
        $recettes->lens_price = $request->input('lens_price');
        $recettes->reste_a_payer = $request->input('reste_a_payer');

        $recettes->save();

        // Emit event for Livewire component
        broadcast(new \App\Events\RecetteCreated($recettes->patient_id))->toOthers();

        return redirect()->route('recette.index')
            ->with('success', 'Recette créée avec succès.');
    }

    public function show(Recette $recette)
    {
        return view('recette.show', compact('recette'));
    }

    public function edit(Recette $recette)
    {
        $montures = Monture::all();
        $patients = Patient::orderBy('prenom')->get();
        return view('recette.edit', compact('recette', 'montures', 'patients'));
    }

    public function update(Request $request, Recette $recette)
    {
        $recette->patient_id = $request->input('patient_id');
        $recette->client_nom = $request->input('client_nom');
        $recette->client_prenom = $request->input('client_prenom');
        $recette->client_telephone = $request->input('client_telephone');
        
        // Vision de Loin
        $recette->oeil_droit_sphere = $request->input('oeil_droit_sphere');
        $recette->oeil_droit_cylindre = $request->input('oeil_droit_cylindre');
        $recette->oeil_droit_axe = $request->input('oeil_droit_axe');
        $recette->oeil_gauche_sphere = $request->input('oeil_gauche_sphere');
        $recette->oeil_gauche_cylindre = $request->input('oeil_gauche_cylindre');
        $recette->oeil_gauche_axe = $request->input('oeil_gauche_axe');

        // Vision de Près
        $recette->oeil_droit_sphere_pres = $request->input('oeil_droit_sphere_pres');
        $recette->oeil_droit_cylindre_pres = $request->input('oeil_droit_cylindre_pres');
        $recette->oeil_droit_axe_pres = $request->input('oeil_droit_axe_pres');
        $recette->oeil_droit_addition = $request->input('oeil_droit_addition');
        $recette->oeil_gauche_sphere_pres = $request->input('oeil_gauche_sphere_pres');
        $recette->oeil_gauche_cylindre_pres = $request->input('oeil_gauche_cylindre_pres');
        $recette->oeil_gauche_axe_pres = $request->input('oeil_gauche_axe_pres');
        $recette->oeil_gauche_addition = $request->input('oeil_gauche_addition');

        // Monture et Verres
        $recette->type_verre = $request->input('type_verre');
        $recette->monture_id = $request->input('monture_id');
        $recette->monture_price = $request->input('monture_price');
        $recette->lens_price = $request->input('lens_price');

        // Informations Financières
        $recette->total = $request->input('total');
        $recette->montant_paye = $request->input('montant_paye');
        $recette->reste_a_payer = $request->input('reste_a_payer');
        $recette->notes = $request->input('notes');

        $recette->save();

        // Emit event for Livewire component
        broadcast(new \App\Events\RecetteUpdated($recette->patient_id))->toOthers();

        return redirect()->route('recette.show', $recette)
            ->with('success', 'Recette mise à jour avec succès.');
    }

    public function destroy(Recette $recette)
    {
        $patientId = $recette->patient_id;
        $recette->delete();

        // Emit event for Livewire component
        broadcast(new \App\Events\RecetteDeleted($patientId))->toOthers();

        return redirect()->route('recette.index')
            ->with('success', 'Recette supprimée avec succès.');
    }

    public function pdf($id)
    {
        $recette = Recette::findOrFail($id);
        $opticienInfo = OpticienInfo::where('is_active', true)->first();
        
        $pdf = Pdf::loadView('recette.pdf', [
            'recette' => $recette,
            'opticienInfo' => $opticienInfo
        ]);
        
        return $pdf->download('recette-' . str_pad($recette->id, 6, '0', STR_PAD_LEFT) . '.pdf');
    }
} 