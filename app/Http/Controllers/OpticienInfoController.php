<?php

namespace App\Http\Controllers;

use App\Models\OpticienInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpticienInfoController extends Controller
{
    /**
     * The storage path for logo files.
     *
     * @var string
     */
    protected $logoPath = 'logos';

    /**
     * Store a logo file and return the path.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return string
     */
    protected function storeLogo($file)
    {
        // Ensure the directory exists
        Storage::disk('public')->makeDirectory($this->logoPath);
        
        // Generate a unique filename with timestamp
        $filename = 'logo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store the file with the custom filename
        $path = $file->storeAs($this->logoPath, $filename, 'public');
        
        return $path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opticienInfo = OpticienInfo::first();
        return view('opticien-info.index', compact('opticienInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opticien-info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'site_web' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'siret' => 'nullable|string|max:14',
            'tva' => 'nullable|string|max:20'
        ]);

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($opticienInfo->logo && Storage::exists('public/' . $opticienInfo->logo)) {
                Storage::delete('public/' . $opticienInfo->logo);
            }
            
            // Store the new logo
            $validated['logo'] = $this->storeLogo($request->file('logo'));
        }

        OpticienInfo::create($validated);

        return redirect()->route('opticien-info.index')
            ->with('success', 'Informations de l\'opticien créées avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpticienInfo  $opticienInfo
     * @return \Illuminate\Http\Response
     */
    public function show(OpticienInfo $opticienInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpticienInfo  $opticienInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(OpticienInfo $opticienInfo)
    {
        return view('opticien-info.edit', compact('opticienInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpticienInfo  $opticienInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpticienInfo $opticienInfo)
    {
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'site_web' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'siret' => 'nullable|string|max:14',
            'tva' => 'nullable|string|max:20'
        ]);

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($opticienInfo->logo && Storage::exists('public/' . $opticienInfo->logo)) {
                Storage::delete('public/' . $opticienInfo->logo);
            }
            
            // Store the new logo
            $validated['logo'] = $this->storeLogo($request->file('logo'));
        }

        $opticienInfo->update($validated);

        return redirect()->route('opticien-info.index')
            ->with('success', 'Informations de l\'opticien mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpticienInfo  $opticienInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpticienInfo $opticienInfo)
    {
        // Delete logo if exists
        if ($opticienInfo->logo && Storage::exists('public/' . $opticienInfo->logo)) {
            Storage::delete('public/' . $opticienInfo->logo);
        }

        $opticienInfo->delete();

        return redirect()->route('opticien-info.index')
            ->with('success', 'Les informations de l\'opticien ont été supprimées avec succès.');
    }
}
