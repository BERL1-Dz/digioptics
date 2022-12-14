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
        $factures = Facture::all();
        //dd($factures);
        return view("facture.index", compact("factures"));
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
    public function show(Facture $facture, Request $request)
    {
        // $request = $facture->id;
        // $all_data = DB::table("factures")
        //     ->where("id", "like", $request)
        //     ->get();
        // dd($all_data);
        // return view("LinkPage", compact("all_data", $all_data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture, $id)
    {
        $data = Facture::find($id);
        $i = 0;
        //dd ($data);
        return view("facture.edit", compact("data","id","i"));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture, $id)
    {
        $data = Facture::find($id);
        $data->facture_pour = request("facture_pour");
        $data->ref = request("ref");
        $data->n_facture = request("n_facture");
        $data->date = request("date");
        $data->designation = request("designation");
        $data->quantite = request("quantite");
        $data->p_unitaire = request("p_unitaire");
        $data->montant = request("montant");
        $data->t_h_t = request("t_h_t");
        $data->t_v_a_p = request("t_v_a_p");
        $data->t_v_a = request("t_v_a");
        $data->t_t_c = request("t_t_c");
        $data->total = request("total");
        $data->update();
        return redirect('/facture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture, $id)
    {
        $data = Facture::find($id);
        $data->delete();
        return redirect()->back();
    }
}
