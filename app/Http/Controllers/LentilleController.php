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
        $lentilles = Lentille::all();
        $fournisseurs = Fournisseur::all();

        return view('lentille.index', compact('lentilles','fournisseurs'));
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

        $Lentille = new Lentille;
        $Lentille->code_fournisseur = request('code_fournisseur');
        $Lentille->fabriquant_lentille = request('fabriquant_lentille');
        $Lentille->libellé = request('libellé');
        $Lentille->port = request('port');
        $Lentille->teinte = request('teinte');
        $Lentille->conditionnement = request('conditionnement');
        $Lentille->essie = request('essie');
        $Lentille->pv_lentille = request('pv_lentille');

        $Lentille->save();
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
    public function edit(Lentille $lentille, $id)
    {
        //
        $fournisseurs = Fournisseur::all();
        $data = Lentille::find($id);
        $i = 0;
        return view("Lentille.edit", compact("data", "fournisseurs","id","i"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lentille $lentille,$id)
    {
        //dd($request->all());
        $Lentille = Lentille::find($id);
        $Lentille->code_fournisseur = request('code_fournisseur');
        $Lentille->fabriquant_lentille = request('fabriquant_lentille');
        $Lentille->libellé = request('libellé');
        $Lentille->port = request('port');
        $Lentille->teinte = request('teinte');
        $Lentille->conditionnement = request('conditionnement');
        $Lentille->essie = request('essie');
        $Lentille->pv_lentille = request('pv_lentille');

        $Lentille->update();
          return redirect('/Lentille');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lentille  $lentille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lentille $lentille, $id)
    {
        //
        $data = Lentille::find($id);
        $data->delete();
        return redirect()->back();

    }
}
