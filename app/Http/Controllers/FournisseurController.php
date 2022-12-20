<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Lentille;
use Illuminate\Http\Verre;
use Illuminate\Http\Monture;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();
        return view('fournisseur.index', compact("fournisseurs"));

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

        $fournisseur = new Fournisseur;
        $fournisseur->code_fournisseur = request('code_fournisseur');
        $fournisseur->nom = request('nom');
        $fournisseur->fabricant_associe = request('fabricant_associe');
        $fournisseur->mail_fournisseur = request('mail_fournisseur');
        $fournisseur->numero_fournisseur = request('numero_fournisseur');

        $fournisseur->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur, $id)
    {
        //
        $data = Fournisseur::find($id);
        $i = 0;

        return view("fournisseur.edit", compact("data","id","i"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur, $id)
    {
        //dd($request->all());

        $fournisseur = Fournisseur::find($id);

        $fournisseur->code_fournisseur = request('code_fournisseur');
        $fournisseur->nom = request('nom');
        $fournisseur->fabricant_associe = request('fabricant_associe');
        $fournisseur->mail_fournisseur = request('mail_fournisseur');
        $fournisseur->numero_fournisseur = request('numero_fournisseur');

        $fournisseur->update();
        return redirect('/fournisseur');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur, $id)
    {
        //
        $fournisseur = Fournisseur::find($id);
        $fournisseur->delete();
        return redirect()->back();
    }
}
