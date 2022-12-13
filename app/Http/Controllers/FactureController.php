<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("facture.index");
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
        $facture = new Facture();

        $facture->facture_pour = request("facture_pour");
        $facture->ref = request("ref");
        $facture->n_facture = request("n_facture");
        $facture->date = request("date");
        $facture->designation = request("designation");
        $facture->quantite = request("quantite");
        $facture->p_unitaire = request("p_unitaire");
        $facture->montant = request("montant");
        $facture->t_h_t = request("t_h_t");
        $facture->t_v_a_p = request("t_v_a_p");
        $facture->t_v_a = request("t_v_a");
        $facture->t_t_c = request("t_t_c");
        $facture->total = request("total");

        $facture->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
