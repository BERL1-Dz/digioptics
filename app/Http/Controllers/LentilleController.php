<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Lentille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LentilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lenttiles = Lentille::all();
        $fournisseurs = Fournisseur::all();

        return view('lenttile.index', compact('lenttiles','fournisseurs'));
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

        $lenttile = new Lentille;
        $lenttile->code_fournisseur = request('code_fournisseur');
        $lenttile->fabriquant_lentille = request('fabriquant_lentille');
        $lenttile->libellé = request('libellé');
        $lenttile->port = request('port');
        $lenttile->teinte = request('teinte');
        $lenttile->conditionnement = request('conditionnement');
        $lenttile->essie = request('essie');
        $lenttile->pv_lentille = request('pv_lentille');

        $lenttile->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function show(Lentille $lentille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function edit(Lentille $lentille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lentille $lentille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lentille $lentille)
    {
        //
    }
}
