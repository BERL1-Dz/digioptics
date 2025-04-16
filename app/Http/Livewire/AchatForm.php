<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fournisseur;
use App\Models\Verre;
use App\Models\Lentille;
use App\Models\Monture;

class AchatForm extends Component
{
    public $fournisseurs;
    public $verres;
    public $lentilles;
    public $montures;
    
    public $date;
    public $fournisseur_id;
    public $notes;
    
    public $verreRows = [];
    public $lentilleRows = [];
    public $montureRows = [];
    
    public $grandTotal = 0;

    public function mount()
    {
        $this->fournisseurs = Fournisseur::all();
        $this->verres = Verre::all();
        $this->lentilles = Lentille::all();
        $this->montures = Monture::all();
        
        // Initialize with one empty row for each type
        $this->addVerreRow();
        $this->addLentilleRow();
        $this->addMontureRow();
    }

    public function addVerreRow()
    {
        $this->verreRows[] = [
            'id' => '',
            'quantite' => 1,
            'prix_unitaire' => 0,
            'total' => 0
        ];
    }

    public function addLentilleRow()
    {
        $this->lentilleRows[] = [
            'id' => '',
            'quantite' => 1,
            'prix_unitaire' => 0,
            'total' => 0
        ];
    }

    public function addMontureRow()
    {
        $this->montureRows[] = [
            'id' => '',
            'quantite' => 1,
            'prix_unitaire' => 0,
            'total' => 0
        ];
    }

    public function removeVerreRow($index)
    {
        unset($this->verreRows[$index]);
        $this->verreRows = array_values($this->verreRows);
        $this->calculateTotals();
    }

    public function removeLentilleRow($index)
    {
        unset($this->lentilleRows[$index]);
        $this->lentilleRows = array_values($this->lentilleRows);
        $this->calculateTotals();
    }

    public function removeMontureRow($index)
    {
        unset($this->montureRows[$index]);
        $this->montureRows = array_values($this->montureRows);
        $this->calculateTotals();
    }

    public function updated($name, $value)
    {
        if (str_contains($name, 'verreRows') || 
            str_contains($name, 'lentilleRows') || 
            str_contains($name, 'montureRows')) {
            $this->calculateTotals();
        }
    }

    public function calculateTotals()
    {
        $this->grandTotal = 0;

        // Calculate verre totals
        foreach ($this->verreRows as &$row) {
            $row['total'] = $row['quantite'] * $row['prix_unitaire'];
            $this->grandTotal += $row['total'];
        }

        // Calculate lentille totals
        foreach ($this->lentilleRows as &$row) {
            $row['total'] = $row['quantite'] * $row['prix_unitaire'];
            $this->grandTotal += $row['total'];
        }

        // Calculate monture totals
        foreach ($this->montureRows as &$row) {
            $row['total'] = $row['quantite'] * $row['prix_unitaire'];
            $this->grandTotal += $row['total'];
        }
    }

    public function render()
    {
        return view('livewire.achat-form');
    }
} 