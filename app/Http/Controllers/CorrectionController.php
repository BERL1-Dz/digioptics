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
    public function index()
    {
        //
        
        $corrections = Correction::all();
        $patients = Patient::all();
        return view("correction.index", compact('corrections' ,'patients'));

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
        dd($request->all());
        
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
