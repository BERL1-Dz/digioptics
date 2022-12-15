<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $patients = Patient::all();
        //dd($patients);
        return view('patient.index', compact("patients"));
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
        $patient = new Patient();

        $patient->nom = request('nom');
        $patient->prenom = request('prenom');
        $patient->age = request('age');

        $patient->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, $id)
    {
      //dd($request->all());
        $data = Patient::find($id);
        $i = 0;
        //dd ($data);
        return view("patient.edit", compact("data","id","i"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, $id)
    {
        //dd($request->all());
      $data = Patient::find($id);
      $data->prenom = request('prenom');
      $data->nom = request('nom');
      $data->age = request('age');
      $data->update();
      return redirect('/patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, $id)
    {
        //
        $data = Patient::find($id);
        $data->delete();
        return redirect()->back();
    }
}
