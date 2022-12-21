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
        //
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
