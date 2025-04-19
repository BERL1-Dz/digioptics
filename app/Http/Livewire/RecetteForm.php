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
    public $monture_price = 0;
    public $lens_price = 0;
    public $monture_id = null;
    public $montures;

    protected $rules = [
        'total' => 'required|numeric|min:0',
        'montant_paye' => 'required|numeric|min:0',
        'monture_price' => 'nullable|numeric|min:0',
        'lens_price' => 'nullable|numeric|min:0',
    ];

    public function mount(Recette $recette = null)
    {
        $this->montures = \App\Models\Monture::all();
        
        if ($recette) {
            $this->recette = $recette;
            $this->total = $recette->total;
            $this->montant_paye = $recette->montant_paye;
            $this->monture_id = $recette->monture_id;
            if ($recette->monture) {
                $this->monture_price = $recette->monture->pv_monture;
            }
            $this->lens_price = $recette->lens_price ?? 0;
            $this->calculateResteAPayer();
        }
    }

    public function updatedMontureId($value)
    {
        if ($value) {
            $monture = \App\Models\Monture::find($value);
            if ($monture) {
                $this->monture_price = $monture->pv_monture;
            }
        } else {
            $this->monture_price = 0;
        }
        $this->calculateTotal();
    }

    public function updatedMonturePrice()
    {
        $this->validateOnly('monture_price');
        $this->calculateTotal();
    }

    public function updatedLensPrice()
    {
        $this->validateOnly('lens_price');
        $this->calculateTotal();
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

    private function calculateTotal()
    {
        $this->total = $this->monture_price + $this->lens_price;
        $this->calculateResteAPayer();
        $this->emit('calculationsUpdated');
    }

    public function render()
    {
        return view('livewire.recette-form');
    }
} 