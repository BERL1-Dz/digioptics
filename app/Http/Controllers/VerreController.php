<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Verre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $verres = Verre::all();
        $fournisseurs = Fournisseur::all();

        return view('verre.index', compact('verres','fournisseurs'));


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
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function show(Verre $verre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function edit(Verre $verre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verre $verre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verre $verre)
    {
        //
    }
}
