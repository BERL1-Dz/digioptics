<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Monture;
use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OpticienInfo;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use App\Services\WhatsAppService;

class RecetteController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recettes = Recette::with('patient')->latest()->get();
        return view('recette.index', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $montures = Monture::all();
        return view('recette.create', compact('patients', 'montures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'client_telephone' => 'nullable|string',
            'client_nom' => 'nullable|string',
            'client_prenom' => 'nullable|string',
            'oeil_droit_sphere' => 'nullable|string',
            'oeil_droit_cylindre' => 'nullable|string', 
            'oeil_droit_axe' => 'nullable|string',
            'oeil_gauche_sphere' => 'nullable|string',
            'oeil_gauche_cylindre' => 'nullable|string',
            'oeil_gauche_axe' => 'nullable|string',
            'oeil_droit_sphere_pres' => 'nullable|string',
            'oeil_droit_cylindre_pres' => 'nullable|string',
            'oeil_droit_axe_pres' => 'nullable|string',
            'oeil_droit_addition' => 'nullable|string',
            'oeil_gauche_sphere_pres' => 'nullable|string',
            'oeil_gauche_cylindre_pres' => 'nullable|string',
            'oeil_gauche_axe_pres' => 'nullable|string',
            'oeil_gauche_addition' => 'nullable|string',
            'monture_price' => 'required|numeric',
            'monture_id' => 'required|exists:montures,id',
            'lens_price' => 'required|numeric',
            'type_verre' => 'nullable|string',
            'total' => 'required|numeric',
            'montant_paye' => 'required|numeric',
            'reste_a_payer' => 'required|numeric',
            'notes' => 'nullable|string',
            'status' => 'required|boolean'
        ]);

        $recette = Recette::create($validated);

        return redirect()->route('recette.index')->with('success', 'Recette créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recette $recette)
    {
        return view('recette.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recette $recette)
    {
        $patients = Patient::all();
        $montures = Monture::all();
        return view('recette.edit', compact('recette', 'patients', 'montures'));
    }

    /**
     * Format phone number for WhatsApp API
     */
    private function formatPhoneNumber($phone)
    {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // If number doesn't start with country code, add it
        if (!preg_match('/^213/', $phone)) {
            $phone = '213' . ltrim($phone, '0');
        }
        
        return $phone;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recette $recette)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'client_nom' => 'nullable|string',
            'client_prenom' => 'nullable|string', 
            'client_telephone' => 'nullable|string',
            'oeil_droit_sphere' => 'nullable|string',
            'oeil_droit_cylindre' => 'nullable|string',
            'oeil_droit_axe' => 'nullable|string', 
            'oeil_gauche_sphere' => 'nullable|string',
            'oeil_gauche_cylindre' => 'nullable|string',
            'oeil_gauche_axe' => 'nullable|string',
            'oeil_droit_sphere_pres' => 'nullable|string',
            'oeil_droit_cylindre_pres' => 'nullable|string', 
            'oeil_droit_axe_pres' => 'nullable|string',
            'oeil_droit_addition' => 'nullable|string',
            'oeil_gauche_sphere_pres' => 'nullable|string',
            'oeil_gauche_cylindre_pres' => 'nullable|string',
            'oeil_gauche_axe_pres' => 'nullable|string',
            'oeil_gauche_addition' => 'nullable|string',
            'monture_price' => 'required|numeric',
            'monture_id' => 'required|exists:montures,id',
            'lens_price' => 'required|numeric',
            'type_verre' => 'nullable|string',
            'total' => 'required|numeric',
            'montant_paye' => 'required|numeric',
            'reste_a_payer' => 'required|numeric',
            'notes' => 'nullable|string',
            'status' => 'required|boolean'
        ]);

        $recette->update($validated);

        // Check if status has been changed to "ready"
        if ($validated['status'] === true && $recette->status !== true) {
            try {
                // Update ready_at timestamp when status changes to ready
                $recette->ready_at = now();
                $recette->save();
                
                // Get client phone number
                $clientPhone = $validated['client_telephone'];
                
                // Only proceed if we have a valid phone number
                if ($clientPhone) {
                    // Prepare message
                    $message = "Bonjour " . $validated['client_prenom'] . " " . $validated['client_nom'] . ", ";
                    $message .= "votre commande est prête à être récupérée. ";
                    $message .= "Pour recevoir les notifications WhatsApp, veuillez envoyer 'join' au numéro +14155238886.";
                    
                    // Send WhatsApp message
                    $sent = $this->whatsAppService->sendMessage($clientPhone, $message);
                    
                    if ($sent) {
                        session()->flash('success', 'La commande est prête. Une notification WhatsApp a été envoyée au client. Le client doit envoyer "join" au numéro +14155238886 pour recevoir les messages.');
                    } else {
                        session()->flash('warning', 'La commande est prête, mais la notification WhatsApp n\'a pas pu être envoyée.');
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error sending WhatsApp notification', [
                    'recette_id' => $recette->id,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                
                session()->flash('error', 'Erreur lors de l\'envoi de la notification WhatsApp: ' . $e->getMessage());
            }
        }

        return redirect()->route('recette.index')->with('success', 'Recette mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();
        return redirect()->route('recette.index')->with('success', 'Recette supprimée avec succès.');
    }

    /**
     * Mark a recette as ready.
     */
    public function markAsReady(Recette $recette)
    {
        $recette->update(['status' => true]);
        
        try {
            // Update ready_at timestamp
            $recette->ready_at = now();
            $recette->save();
            
            // Get client phone number
            $clientPhone = $recette->client_telephone;
            
            // Only proceed if we have a valid phone number
            if ($clientPhone) {
                // Prepare message
                $message = "Bonjour " . $recette->client_prenom . " " . $recette->client_nom . ", ";
                $message .= "votre commande est prête à être récupérée. ";
                $message .= "Pour recevoir les notifications WhatsApp, veuillez envoyer 'join' au numéro +14155238886.";
                
                // Send WhatsApp message
                $sent = $this->whatsAppService->sendMessage($clientPhone, $message);
                
                if ($sent) {
                    session()->flash('success', 'La commande est prête. Une notification WhatsApp a été envoyée au client. Le client doit envoyer "join" au numéro +14155238886 pour recevoir les messages.');
                } else {
                    session()->flash('warning', 'La commande est prête, mais la notification WhatsApp n\'a pas pu être envoyée.');
                }
            }
        } catch (\Exception $e) {
            Log::error('Error sending WhatsApp notification', [
                'recette_id' => $recette->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            session()->flash('error', 'Erreur lors de l\'envoi de la notification WhatsApp: ' . $e->getMessage());
        }
        
        return redirect()->route('recette.index')->with('success', 'Recette marked as ready successfully.');
    }

    /**
     * Mark a recette as not ready.
     */
    public function markAsNotReady(Recette $recette)
    {
        $recette->update(['status' => false]);
        return redirect()->route('recette.index')->with('success', 'Recette marked as not ready successfully.');
    }

    /**
     * Generate PDF for the recette.
     */
    public function pdf(Recette $recette)
    {
        $opticienInfo = OpticienInfo::where('is_active', true)->first();
        
        $pdf = Pdf::loadView('recette.pdf', [
            'recette' => $recette,
            'opticienInfo' => $opticienInfo
        ]);
        
        return $pdf->download('recette-' . $recette->id . '.pdf');
    }
} 