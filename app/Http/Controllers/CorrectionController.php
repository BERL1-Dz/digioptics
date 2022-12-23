<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Correction;
use App\Models\Patient;
use Illuminate\Http\Request;

class CorrectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $corrections = Correction::all();
        $patients = Patient::all();
        dd($patients);
        return view("correction.index", compact('corrections' ,'patients'));

    }

    public function vision_p(Request $request)
    {
        //dd($request->all());
        
        $correction = new Correction();

        $correction->date = request('date');
        $correction->patient_id = request('patient_id');
        $correction->sph_od = request('sph_od');
        $correction->sph_og = request('sph_og');
        $correction->cly_od = request('cly_od');
        $correction->cly_og = request('cly_og');
        $correction->axe_od = request('axe_od');
        $correction->axe_og = request('axe_og');
        $correction->option = request('option');

        $correction->save();
        return back();

    }

    public function vision_l(Request $request)
    {
        //
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
    public function show(Correction $correction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function edit(Correction $correction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correction $correction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correction  $correction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correction $correction)
    {
        //
    }
}
