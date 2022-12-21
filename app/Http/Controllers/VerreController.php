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
        //dd($request->all());

        $verre = new Verre;
        $verre->code_fournisseur = request('code_fournisseur');
        $verre->code_verre = request('code_verre');
        $verre->index_verre = request('index_verre');
        $verre->material = request('material');
        $verre->diametre = request('diametre');
        $verre->surface = request('surface');
        $verre->sph = request('sph');
        $verre->cly = request('cly');
        $verre->option = request('option');
        $verre->pa_verre = request('pa_verre');
        $verre->pv_verre = request('pv_verre');

        $verre->save();
        return back();

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
    public function edit(Verre $verre, $id)
    {
        //
        $fournisseurs = Fournisseur::all();
        $data = Verre::find($id);
        $i = 0;
        return view("verre.edit", compact("data", "fournisseurs","id","i"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verre $verre, $id)
    {
        //dd($request->all());
        $verre = Verre::find($id);

        $verre->code_fournisseur = request('code_fournisseur');
        $verre->code_verre = request('code_verre');
        $verre->index_verre = request('index_verre');
        $verre->material = request('material');
        $verre->diametre = request('diametre');
        $verre->surface = request('surface');
        $verre->sph = request('sph');
        $verre->cly = request('cly');
        $verre->option = request('option');
        $verre->pa_verre = request('pa_verre');
        $verre->pv_verre = request('pv_verre');

        $verre->update();
        return redirect('/verre');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verre  $verre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verre $verre, $id)
    {
        //
        $data = Verre::find($id);
        $data->delete();
        return redirect()->back();

    }
}
