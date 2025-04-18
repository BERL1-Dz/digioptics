<?php

namespace App\Http\Controllers;

use App\Models\Vent;
use App\Models\Fournisseur;
use App\Models\Verre;
use App\Models\Lentille;
use App\Models\Monture;
use App\Models\OpticienInfo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vents = Vent::with('fournisseur')->latest()->get();
        return view('vent.index', compact('vents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $verres = Verre::all();
        $lentilles = Lentille::all();
        $montures = Monture::all();
        return view('vent.create', compact('fournisseurs', 'verres', 'lentilles', 'montures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'notes' => 'nullable|string|max:1000',
            'total' => 'required|numeric|min:0',
            'verres' => 'required|array',
            'verres.*.id' => 'required|exists:verres,id',
            'verres.*.quantite' => 'required|integer|min:1',
            'verres.*.prix_unitaire' => 'required|numeric|min:0',
            'lentilles' => 'required|array',
            'lentilles.*.id' => 'required|exists:lentilles,id',
            'lentilles.*.quantite' => 'required|integer|min:1',
            'lentilles.*.prix_unitaire' => 'required|numeric|min:0',
            'montures' => 'required|array',
            'montures.*.id' => 'required|exists:montures,id',
            'montures.*.quantite' => 'required|integer|min:1',
            'montures.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        // Get active OpticienInfo
        $opticienInfo = OpticienInfo::where('is_active', true)->first();

        // Create the Vent record
        $vent = Vent::create([
            'date' => $validatedData['date'],
            'fournisseur_id' => $validatedData['fournisseur_id'],
            'notes' => $validatedData['notes'] ?? null,
            'total' => $validatedData['total'],
            'opticien_info_id' => $opticienInfo ? $opticienInfo->id : null
        ]);

        // Attach verres with their totals
        foreach ($validatedData['verres'] as $verre) {
            $total = $verre['quantite'] * $verre['prix_unitaire'];
            $vent->verres()->attach($verre['id'], [
                'quantite' => $verre['quantite'],
                'prix_unitaire' => $verre['prix_unitaire'],
                'total' => $total
            ]);
        }

        // Attach lentilles with their totals
        foreach ($validatedData['lentilles'] as $lentille) {
            $total = $lentille['quantite'] * $lentille['prix_unitaire'];
            $vent->lentilles()->attach($lentille['id'], [
                'quantite' => $lentille['quantite'],
                'prix_unitaire' => $lentille['prix_unitaire'],
                'total' => $total
            ]);
        }

        // Attach montures with their totals
        foreach ($validatedData['montures'] as $monture) {
            $total = $monture['quantite'] * $monture['prix_unitaire'];
            $vent->montures()->attach($monture['id'], [
                'quantite' => $monture['quantite'],
                'prix_unitaire' => $monture['prix_unitaire'],
                'total' => $total
            ]);
        }

        return redirect()->route('vent.index')
            ->with('success', 'Vente créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vent  $vent
     * @return \Illuminate\Http\Response
     */
    public function show(Vent $vent)
    {
        $vent->load(['fournisseur', 'verres', 'lentilles', 'montures', 'opticienInfo']);
        return view('vent.show', compact('vent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vent  $vent
     * @return \Illuminate\Http\Response
     */
    public function edit(Vent $vent)
    {
        $vent->load(['verres', 'lentilles', 'montures']);
        $fournisseurs = Fournisseur::all();
        $verres = Verre::all();
        $lentilles = Lentille::all();
        $montures = Monture::all();
        return view('vent.edit', compact('vent', 'fournisseurs', 'verres', 'lentilles', 'montures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vent  $vent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vent $vent)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'notes' => 'nullable|string|max:1000',
            'total' => 'required|numeric|min:0',
            'verres' => 'required|array',
            'verres.*.id' => 'required|exists:verres,id',
            'verres.*.quantite' => 'required|integer|min:1',
            'verres.*.prix_unitaire' => 'required|numeric|min:0',
            'lentilles' => 'required|array',
            'lentilles.*.id' => 'required|exists:lentilles,id',
            'lentilles.*.quantite' => 'required|integer|min:1',
            'lentilles.*.prix_unitaire' => 'required|numeric|min:0',
            'montures' => 'required|array',
            'montures.*.id' => 'required|exists:montures,id',
            'montures.*.quantite' => 'required|integer|min:1',
            'montures.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        // If opticien_info is not set, get the active one
        if (!$vent->opticien_info_id) {
            $opticienInfo = OpticienInfo::where('is_active', true)->first();
            $opticienInfoId = $opticienInfo ? $opticienInfo->id : null;
        } else {
            $opticienInfoId = $vent->opticien_info_id;
        }

        // Update the Vent record
        $vent->update([
            'date' => $validatedData['date'],
            'fournisseur_id' => $validatedData['fournisseur_id'],
            'notes' => $validatedData['notes'] ?? null,
            'total' => $validatedData['total'],
            'opticien_info_id' => $opticienInfoId
        ]);

        // Sync verres with their totals
        $vent->verres()->detach();
        foreach ($validatedData['verres'] as $verre) {
            $total = $verre['quantite'] * $verre['prix_unitaire'];
            $vent->verres()->attach($verre['id'], [
                'quantite' => $verre['quantite'],
                'prix_unitaire' => $verre['prix_unitaire'],
                'total' => $total
            ]);
        }

        // Sync lentilles with their totals
        $vent->lentilles()->detach();
        foreach ($validatedData['lentilles'] as $lentille) {
            $total = $lentille['quantite'] * $lentille['prix_unitaire'];
            $vent->lentilles()->attach($lentille['id'], [
                'quantite' => $lentille['quantite'],
                'prix_unitaire' => $lentille['prix_unitaire'],
                'total' => $total
            ]);
        }

        // Sync montures with their totals
        $vent->montures()->detach();
        foreach ($validatedData['montures'] as $monture) {
            $total = $monture['quantite'] * $monture['prix_unitaire'];
            $vent->montures()->attach($monture['id'], [
                'quantite' => $monture['quantite'],
                'prix_unitaire' => $monture['prix_unitaire'],
                'total' => $total
            ]);
        }

        return redirect()->route('vent.index')
            ->with('success', 'Vente mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vent  $vent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vent $vent)
    {
        $vent->verres()->detach();
        $vent->lentilles()->detach();
        $vent->montures()->detach();
        $vent->delete();
        return redirect()->route('vent.index')->with('success', 'Vente supprimée avec succès.');
    }

    public function pdf(Vent $vent, Request $request)
    {
        $opticienInfo = OpticienInfo::where('is_active', true)->first();
        $pdf = Pdf::loadView('vent.pdf', [
            'vent' => $vent,
            'opticienInfo' => $opticienInfo
        ]);
        
        // If preview parameter is set, show PDF in browser
        if ($request->has('preview')) {
            return $pdf->stream('vent-' . str_pad($vent->id, 6, '0', STR_PAD_LEFT) . '.pdf');
        }
        
        // Otherwise download it
        return $pdf->download('vent-' . str_pad($vent->id, 6, '0', STR_PAD_LEFT) . '.pdf');
    }
}
