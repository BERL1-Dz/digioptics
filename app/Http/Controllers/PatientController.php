<?php 

namespace App\Http\Controllers;

class PatientController extends Controller
{
    Public function index()
    {
        return view('fichiers.patient');
    }
}