<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Correction;
use App\Models\Patient;
use App\Models\Monture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Traits\OpticienInfoTrait;

class CorrectionController extends Controller
{
    use OpticienInfoTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $corrections = Correction::with('patient')->get();
        $patients = Patient::with('corrections')->get();
        $montures = Monture::with('corrections')->get();
        //dd($montures);
        //

        return view("correction.index", compact('corrections' ,'patients','montures'));

    }

    public function vision_p(Request $request)
    {
        //dd($request->all());

        $correction = new Correction();
        $correction->type_vision = request('type_vision');
        $correction->date = request('date');
        $correction->patient_id = request('patient_id');
        $correction->sph_od = request('sph_od');
        $correction->sph_og = request('sph_og');
        $correction->cly_od = request('cly_od');
        $correction->cly_og = request('cly_og');
        $correction->axe_od = request('axe_od');
        $correction->axe_og = request('axe_og');
        $correction->add_od = request('add_od');
        $correction->add_og = request('add_og');
        $correction->PD = request('PD');
        $correction->Near_Pd = request('Near_Pd');
        $correction->option = request('option');
        $correction->monture_id = request('monture_id');
        $correction->save();
        return back();

    }

    public function vision_l(Request $request)
    {
        //dd($request->all());

        $correction = new Correction();

        $correction->type_vision = request('type_vision');
        $correction->date = request('date');
        $correction->patient_id = request('patient_id');
        $correction->sph_od = request('sph_od');
        $correction->sph_og = request('sph_og');
        $correction->cly_od = request('cly_od');
        $correction->cly_og = request('cly_og');
        $correction->axe_od = request('axe_od');
        $correction->axe_og = request('axe_og');
        $correction->option = request('option');
        $correction->monture_id = request('monture_id');
        $correction->PD = request('PD');

        $correction->save();
        return back();
    }

    
    public function lentille(Request $request)
    {
        //dd($request->all());

        $correction = new Correction();

        $correction->type_vision = request('type_vision');
        $correction->date = request('date');
        $correction->patient_id = request('patient_id');
        $correction->sph_od = request('sph_od');
        $correction->sph_og = request('sph_og');
        $correction->cly_od = request('cly_od');
        $correction->cly_og = request('cly_og');
        $correction->axe_od = request('axe_od');
        $correction->axe_og = request('axe_og');
        $correction->bc_od = request('bc_od');//new
        $correction->bc_og = request('bc_og');//new
        $correction->dia_od = request('dia_od');//new
        $correction->dia_og = request('dia_og');//new
        $correction->durabilite = request('durabilite');//new
        $correction->confort = request('confort');//new
        $correction->option_supp = request('option_supp');//new
        $correction->couleurs = request('couleurs');//new
        $correction->niveau_trans = request('niveau_trans');//new
        $correction->types = request('types');//new
        $correction->quantite = request('quantite'); //new

        $correction->save();
        return back();
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
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function show(Correction $correction, $id)
    {
        //
        $patients = Patient::all();
        $corrections = Correction::find($id);
        $montures = Monture::find($id);
        //dd($patient);
        return view("correction.show", compact('patients','corrections', 'montures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corrections = Correction::find($id);
        $patients = Patient::all();
        $montures = Monture::all();
        return view('correction.edit', compact('corrections', 'patients', 'montures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $correction = Correction::findOrFail($id);
        $correction->update($request->all());
        return redirect()->route('correction.index')->with('success', 'Correction mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correction = Correction::findOrFail($id);
        $correction->delete();
        return redirect()->route('correction.index')->with('success', 'Correction supprimée avec succès');
    }

    public function printPDF($id)
    {
        $correction = Correction::findOrFail($id);
        $patient = Patient::findOrFail($correction->patient_id);
        $monture = Monture::findOrFail($correction->monture_id);
        $opticienInfo = $this->getActiveOpticienInfo();
        
        $pdf = PDF::loadView('correction.pdf', compact('correction', 'patient', 'monture', 'opticienInfo'));
        return $pdf->download('correction.pdf');
    }
}
