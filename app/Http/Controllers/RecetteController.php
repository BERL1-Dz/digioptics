<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Monture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return view('recette.create', compact('montures'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'client_nom' => 'required|string|max:255',
            'client_prenom' => 'required|string|max:255',
            'client_telephone' => 'required|string|max:20',
            // Vision de Loin - Right Eye
            'oeil_droit_sphere' => 'nullable|string',
            'oeil_droit_cylindre' => 'nullable|string',
            'oeil_droit_axe' => 'nullable|string',
            // Vision de Loin - Left Eye
            'oeil_gauche_sphere' => 'nullable|string',
            'oeil_gauche_cylindre' => 'nullable|string',
            'oeil_gauche_axe' => 'nullable|string',
            // Vision de Près - Right Eye
            'oeil_droit_sphere_pres' => 'nullable|string',
            'oeil_droit_cylindre_pres' => 'nullable|string',
            'oeil_droit_axe_pres' => 'nullable|string',
            'oeil_droit_addition' => 'nullable|string',
            // Vision de Près - Left Eye
            'oeil_gauche_sphere_pres' => 'nullable|string',
            'oeil_gauche_cylindre_pres' => 'nullable|string',
            'oeil_gauche_axe_pres' => 'nullable|string',
            'oeil_gauche_addition' => 'nullable|string',
            // Other fields
            'type_verre' => 'required|in:HMC,HC,BB',
            'monture_id' => 'required|exists:montures,id',
            'total' => 'required|numeric|min:0',
            'montant_paye' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $validated['reste_a_payer'] = $validated['total'] - $validated['montant_paye'];

        Recette::create($validated);

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
        return view('recette.edit', compact('recette', 'montures'));
    }

    public function update(Request $request, Recette $recette)
    {
        $validated = $request->validate([
            'client_nom' => 'required|string|max:255',
            'client_prenom' => 'required|string|max:255',
            'client_telephone' => 'required|string|max:255',
            'oeil_droit_sphere' => 'required|string|max:255',
            'oeil_droit_cylindre' => 'required|string|max:255',
            'oeil_droit_axe' => 'required|string|max:255',
            'oeil_gauche_sphere' => 'required|string|max:255',
            'oeil_gauche_cylindre' => 'required|string|max:255',
            'oeil_gauche_axe' => 'required|string|max:255',
            'oeil_droit_sphere_pres' => 'nullable|string|max:255',
            'oeil_droit_cylindre_pres' => 'nullable|string|max:255',
            'oeil_droit_axe_pres' => 'nullable|string|max:255',
            'oeil_droit_addition' => 'nullable|string|max:255',
            'oeil_gauche_sphere_pres' => 'nullable|string|max:255',
            'oeil_gauche_cylindre_pres' => 'nullable|string|max:255',
            'oeil_gauche_axe_pres' => 'nullable|string|max:255',
            'oeil_gauche_addition' => 'nullable|string|max:255',
            'monture_id' => 'required|exists:montures,id',
            'type_verre' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'montant_paye' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $validated['reste_a_payer'] = max(0, $validated['total'] - $validated['montant_paye']);

        $recette->update($validated);

        return redirect()->route('recette.show', $recette)
            ->with('success', 'Recette mise à jour avec succès.');
    }

    public function destroy(Recette $recette)
    {
        $recette->delete();

        return redirect()->route('recette.index')
            ->with('success', 'Recette supprimée avec succès.');
    }

    public function pdf(Recette $recette)
    {
        $pdf = Pdf::loadView('recette.pdf', compact('recette'));
        return $pdf->download('recette-' . str_pad($recette->id, 6, '0', STR_PAD_LEFT) . '.pdf');
    }
} 