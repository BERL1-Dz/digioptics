<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recette;

class RecetteForm extends Component
{
    public $total = 0;
    public $montant_paye = 0;
    public $reste_a_payer = 0;
    public $recette;
    public $isEdit = false;

    protected $rules = [
        'total' => 'required|numeric|min:0',
        'montant_paye' => 'required|numeric|min:0',
    ];

    public function mount(Recette $recette = null)
    {
        if ($recette) {
            $this->recette = $recette;
            $this->total = $recette->total;
            $this->montant_paye = $recette->montant_paye;
            $this->isEdit = true;
            $this->calculateResteAPayer();
        }
    }

    public function updatedTotal()
    {
        $this->validateOnly('total');
        $this->calculateResteAPayer();
        $this->emit('calculationsUpdated');
    }

    public function updatedMontantPaye()
    {
        $this->validateOnly('montant_paye');
        $this->calculateResteAPayer();
        $this->emit('calculationsUpdated');
    }

    private function calculateResteAPayer()
    {
        $this->reste_a_payer = max(0, $this->total - $this->montant_paye);
    }

    public function render()
    {
        return view('livewire.recette-form', [
            'isEdit' => $this->isEdit,
            'recette' => $this->recette
        ]);
    }
} 