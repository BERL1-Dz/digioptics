<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Accessoire;
use Illuminate\Http\Category;
use Illuminate\Support\Facades\DB;
class AccessoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $accessoires = Accessoire::all();
        $categories = Category::all();
        return view('accessoire.index', compact('accessoires','categories'));
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
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function show(Accessoire $accessoire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessoire $accessoire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessoire $accessoire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessoire $accessoire)
    {
        //
    }
}
