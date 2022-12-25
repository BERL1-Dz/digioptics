<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Monture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MontureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $montures = Monture::all();
        $fournisseurs = Fournisseur::all();

        return view('monture.index', compact('montures','fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $monture = new Monture();
        $monture->code_fournisseur = request('code_fournisseur');
        $monture->nom_fournisseur = request('nom_fournisseur');
        $monture->code_monture = request('code_monture');
        $monture->marque_monture = request('marque_monture');
        $monture->matiere_monture = request('marque_monture');
        $monture->taille_monture = request('taille_monture');
        $monture->model_monture = request('model_monture');
        $monture->type_monture = request('type_monture');
        $monture->coloris = request('coloris');
        $monture->coloris_libellé = request('coloris_libellé');
        $monture->style_monture = request('style_monture');
        $monture->genre_monture = request('genre_monture');
        $monture->pa_monture = request('pa_monture');
        $monture->pv_monture = request('pv_monture');

        $monture->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monture  $monture
     * @return \Illuminate\Http\Response
     */
    public function show(Monture $monture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monture  $monture
     * @return \Illuminate\Http\Response
     */
    public function edit(Monture $monture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monture  $monture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monture $monture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monture  $monture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monture $monture)
    {
        //
    }
}
