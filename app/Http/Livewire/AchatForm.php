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
    
    protected $listeners = ['refreshTotals' => 'calculateTotals'];

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

    public function updatedVerreRows($value, $key)
    {
        $parts = explode('.', $key);
        $index = $parts[0];
        $field = $parts[1] ?? null;

        if ($field === 'id' && $value) {
            $verre = Verre::find($value);
            if ($verre) {
                $this->verreRows[$index]['prix_unitaire'] = $verre->prix_achat;
            }
        }
        
        $this->calculateTotals();
    }

    public function updatedLentilleRows($value, $key)
    {
        $parts = explode('.', $key);
        $index = $parts[0];
        $field = $parts[1] ?? null;

        if ($field === 'id' && $value) {
            $lentille = Lentille::find($value);
            if ($lentille) {
                $this->lentilleRows[$index]['prix_unitaire'] = $lentille->prix_achat;
            }
        }
        
        $this->calculateTotals();
    }

    public function updatedMontureRows($value, $key)
    {
        $parts = explode('.', $key);
        $index = $parts[0];
        $field = $parts[1] ?? null;

        if ($field === 'id' && $value) {
            $monture = Monture::find($value);
            if ($monture) {
                $this->montureRows[$index]['prix_unitaire'] = $monture->prix_achat;
            }
        }
        
        $this->calculateTotals();
    }
    
    // Generic updated method to catch any other changes
    public function updated()
    {
        $this->calculateTotals();
    }

    public function hydrate()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->grandTotal = 0;

        // Calculate verre totals
        foreach ($this->verreRows as $index => &$row) {
            if (!isset($row['quantite']) || !isset($row['prix_unitaire'])) {
                $row['total'] = 0;
                continue;
            }
            
            $quantite = floatval($row['quantite']);
            $prix = floatval($row['prix_unitaire']);
            $row['total'] = $quantite * $prix;
            $this->grandTotal += $row['total'];
        }

        // Calculate lentille totals
        foreach ($this->lentilleRows as $index => &$row) {
            if (!isset($row['quantite']) || !isset($row['prix_unitaire'])) {
                $row['total'] = 0;
                continue;
            }
            
            $quantite = floatval($row['quantite']);
            $prix = floatval($row['prix_unitaire']);
            $row['total'] = $quantite * $prix;
            $this->grandTotal += $row['total'];
        }

        // Calculate monture totals
        foreach ($this->montureRows as $index => &$row) {
            if (!isset($row['quantite']) || !isset($row['prix_unitaire'])) {
                $row['total'] = 0;
                continue;
            }
            
            $quantite = floatval($row['quantite']);
            $prix = floatval($row['prix_unitaire']);
            $row['total'] = $quantite * $prix;
            $this->grandTotal += $row['total'];
        }
        
        // Emit an event to refresh the UI
        $this->emit('refreshTotals');
    }

    public function render()
    {
        return view('livewire.achat-form');
    }
} 