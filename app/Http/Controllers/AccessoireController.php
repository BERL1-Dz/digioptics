<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Accessoire;
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
        //dd($request->all());
        $accessoire = new Accessoire();

        $accessoire->categorie_id = request('categorie_id');
        $accessoire->model = request('model');
        $accessoire->marque = request('marque');
        $accessoire->prix = request('prix');
        $accessoire->genre = request('genre');

        $accessoire->save();
        return back();
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
    public function edit(Accessoire $accessoire, $id)
    {
        //
        $categories = Category::all();
        $data = Accessoire::find($id);
        $i = 0;
        return view("accessoire.edit", compact("data", "categories","id","i"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessoire $accessoire,$id)
    {
        //dd($request->all());

        $accessoire = Accessoire::find($id);

        $accessoire->categorie_id = request('categorie_id');
        $accessoire->model = request('model');
        $accessoire->marque = request('marque');
        $accessoire->prix = request('prix');
        $accessoire->genre = request('genre');

        $accessoire->update();
        return redirect('/accessoire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessoire $accessoire, $id)
    {
        //
        $data = Accessoire::find($id);
        $data->delete();
        return redirect()->back();

    }
}
