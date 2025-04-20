<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Recette;

class PatientShow extends Component
{
    public $patient;
    public $totalRecettes = 0;
    public $totalPaye = 0;
    public $totalReste = 0;

    protected $listeners = [
        'echo:recettes,RecetteCreated' => 'calculateTotals',
        'echo:recettes,RecetteUpdated' => 'calculateTotals',
        'echo:recettes,RecetteDeleted' => 'calculateTotals'
    ];

    public function mount($patientId)
    {
        $this->patient = Patient::with('recettes')->findOrFail($patientId);
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->patient->refresh(); // Refresh the patient data to get latest recettes
        $this->totalRecettes = $this->patient->recettes->sum('total');
        $this->totalPaye = $this->patient->recettes->sum('montant_paye');
        $this->totalReste = $this->patient->recettes->sum('reste_a_payer');
    }

    public function render()
    {
        return view('livewire.patient-show', [
            'patient' => $this->patient,
            'totalRecettes' => $this->totalRecettes,
            'totalPaye' => $this->totalPaye,
            'totalReste' => $this->totalReste
        ]);
    }
}
