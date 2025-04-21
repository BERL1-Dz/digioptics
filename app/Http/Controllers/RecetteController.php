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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recettes = Recette::with('patient')->latest()->get();
        return view('recette.index', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $montures = Monture::all();
        return view('recette.create', compact('patients', 'montures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|in:ready,not_ready'
        ]);

        $recette = Recette::create($validated);

        if ($request->status === 'ready') {
            $recette->markAsReady();
        }

        return redirect()->route('recettes.index')->with('success', 'Recette créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recette $recette)
    {
        return view('recette.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recette $recette)
    {
        $patients = Patient::all();
        $montures = Monture::all();
        return view('recette.edit', compact('recette', 'patients', 'montures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recette $recette)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|in:ready,not_ready'
        ]);

        $recette->update($validated);

        if ($request->status === 'ready') {
            $recette->markAsReady();
        } else {
            $recette->markAsNotReady();
        }

        return redirect()->route('recettes.index')->with('success', 'Recette mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();
        return redirect()->route('recettes.index')->with('success', 'Recette supprimée avec succès.');
    }

    /**
     * Mark a recette as ready.
     */
    public function markAsReady(Recette $recette)
    {
        $recette->update(['status' => 'ready']);
        return redirect()->route('recettes.index')->with('success', 'Recette marked as ready successfully.');
    }

    /**
     * Mark a recette as not ready.
     */
    public function markAsNotReady(Recette $recette)
    {
        $recette->update(['status' => 'not_ready']);
        return redirect()->route('recettes.index')->with('success', 'Recette marked as not ready successfully.');
    }

    /**
     * Generate PDF for the recette.
     */
    public function pdf(Recette $recette)
    {
        $opticienInfo = OpticienInfo::where('is_active', true)->first();
        
        $pdf = Pdf::loadView('recette.pdf', [
            'recette' => $recette,
            'opticienInfo' => $opticienInfo
        ]);
        
        return $pdf->download('recette-' . $recette->id . '.pdf');
    }
} 