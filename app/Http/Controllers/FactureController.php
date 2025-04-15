<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Facture;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Traits\OpticienInfoTrait;

class FactureController extends Controller
{
    use OpticienInfoTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        $factures = Facture::all();
        //dd($factures);
        return view("facture.index", compact('factures','patients'));
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
        $facture->patient_id = request("patient_id");
        //$facture->facture_pour = request("facture_pour");
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

        $facture->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture, Request $request, $id)
    {
        $data = Facture::find($id);
        //dd ($data);
        return view("facture.show", compact("data","id"));
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
        //dd($request->all());
        $data = Facture::find($id);
        $facture->patient_id = request("patient_id");
        //$data->facture_pour = request("facture_pour");
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

    public function print($id)
    {
        $facture = Facture::with('patient')->findOrFail($id);
        
        // Transform the data into the expected format
        $details = [];
        for ($i = 0; $i < count($facture->designation); $i++) {
            $details[] = [
                'description' => $facture->designation[$i],
                'quantite' => $facture->quantite[$i],
                'p_unitaire' => $facture->p_unitaire[$i],
                'montant' => $facture->montant[$i]
            ];
        }
        $facture->details = $details;
        $facture->total = $facture->t_t_c;
        $facture->numero = $facture->n_facture;

        // Get optician info from trait
        $opticienInfo = $this->getActiveOpticienInfo();

        return view('facture.print', compact('facture', 'opticienInfo'));
    }
}
