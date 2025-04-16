<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Fournisseur;
use App\Models\Verre;
use App\Models\Lentille;
use App\Models\Monture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achats = Achat::with('fournisseur')->latest()->get();
        $fournisseurs = Fournisseur::all();
        $verres = Verre::all();
        $lentilles = Lentille::all();
        $montures = Monture::all();

        return view('achat.index', compact('achats', 'fournisseurs', 'verres', 'lentilles', 'montures'));
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
        return view('achat.create', compact('fournisseurs', 'verres', 'lentilles', 'montures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'notes' => 'nullable|string',
            'verres' => 'nullable|array',
            'verres.*.id' => 'required|exists:verres,id',
            'verres.*.quantite' => 'required|integer|min:1',
            'verres.*.prix_unitaire' => 'required|numeric|min:0',
            'lentilles' => 'nullable|array',
            'lentilles.*.id' => 'required|exists:lentilles,id',
            'lentilles.*.quantite' => 'required|integer|min:1',
            'lentilles.*.prix_unitaire' => 'required|numeric|min:0',
            'montures' => 'nullable|array',
            'montures.*.id' => 'required|exists:montures,id',
            'montures.*.quantite' => 'required|integer|min:1',
            'montures.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $achat = Achat::create([
                'date' => $validated['date'],
                'fournisseur_id' => $validated['fournisseur_id'],
                'notes' => $validated['notes'] ?? null,
            ]);

            $total = 0;

            // Attach verres
            if (!empty($validated['verres'])) {
                foreach ($validated['verres'] as $verre) {
                    $rowTotal = $verre['quantite'] * $verre['prix_unitaire'];
                    $achat->verres()->attach($verre['id'], [
                        'quantite' => $verre['quantite'],
                        'prix_unitaire' => $verre['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            // Attach lentilles
            if (!empty($validated['lentilles'])) {
                foreach ($validated['lentilles'] as $lentille) {
                    $rowTotal = $lentille['quantite'] * $lentille['prix_unitaire'];
                    $achat->lentilles()->attach($lentille['id'], [
                        'quantite' => $lentille['quantite'],
                        'prix_unitaire' => $lentille['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            // Attach montures
            if (!empty($validated['montures'])) {
                foreach ($validated['montures'] as $monture) {
                    $rowTotal = $monture['quantite'] * $monture['prix_unitaire'];
                    $achat->montures()->attach($monture['id'], [
                        'quantite' => $monture['quantite'],
                        'prix_unitaire' => $monture['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            $achat->update(['total' => $total]);

            DB::commit();

            return redirect()->route('achat.index')
                ->with('success', 'Achat créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue lors de la création de l\'achat.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function show(Achat $achat)
    {
        $achat->load(['fournisseur', 'verres', 'lentilles', 'montures']);
        return view('achat.show', compact('achat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function edit(Achat $achat)
    {
        $fournisseurs = Fournisseur::all();
        $verres = Verre::all();
        $lentilles = Lentille::all();
        $montures = Monture::all();

        return view('achat.edit', compact('achat', 'fournisseurs', 'verres', 'lentilles', 'montures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achat $achat)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'notes' => 'nullable|string',
            'verres' => 'nullable|array',
            'verres.*.id' => 'required|exists:verres,id',
            'verres.*.quantite' => 'required|integer|min:1',
            'verres.*.prix_unitaire' => 'required|numeric|min:0',
            'lentilles' => 'nullable|array',
            'lentilles.*.id' => 'required|exists:lentilles,id',
            'lentilles.*.quantite' => 'required|integer|min:1',
            'lentilles.*.prix_unitaire' => 'required|numeric|min:0',
            'montures' => 'nullable|array',
            'montures.*.id' => 'required|exists:montures,id',
            'montures.*.quantite' => 'required|integer|min:1',
            'montures.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $achat->update([
                'date' => $validated['date'],
                'fournisseur_id' => $validated['fournisseur_id'],
                'notes' => $validated['notes'] ?? null,
            ]);

            $total = 0;

            // Detach all existing relationships
            $achat->verres()->detach();
            $achat->lentilles()->detach();
            $achat->montures()->detach();

            // Attach verres
            if (!empty($validated['verres'])) {
                foreach ($validated['verres'] as $verre) {
                    $rowTotal = $verre['quantite'] * $verre['prix_unitaire'];
                    $achat->verres()->attach($verre['id'], [
                        'quantite' => $verre['quantite'],
                        'prix_unitaire' => $verre['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            // Attach lentilles
            if (!empty($validated['lentilles'])) {
                foreach ($validated['lentilles'] as $lentille) {
                    $rowTotal = $lentille['quantite'] * $lentille['prix_unitaire'];
                    $achat->lentilles()->attach($lentille['id'], [
                        'quantite' => $lentille['quantite'],
                        'prix_unitaire' => $lentille['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            // Attach montures
            if (!empty($validated['montures'])) {
                foreach ($validated['montures'] as $monture) {
                    $rowTotal = $monture['quantite'] * $monture['prix_unitaire'];
                    $achat->montures()->attach($monture['id'], [
                        'quantite' => $monture['quantite'],
                        'prix_unitaire' => $monture['prix_unitaire'],
                        'total' => $rowTotal,
                    ]);
                    $total += $rowTotal;
                }
            }

            $achat->update(['total' => $total]);

            DB::commit();

            return redirect()->route('achat.index')
                ->with('success', 'Achat mis à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'achat.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achat $achat)
    {
        try {
            DB::beginTransaction();
            $achat->verres()->detach();
            $achat->lentilles()->detach();
            $achat->montures()->detach();
            $achat->delete();
            DB::commit();

            return redirect()->route('achat.index')
                ->with('success', 'Achat supprimé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue lors de la suppression de l\'achat.');
        }
    }
}
