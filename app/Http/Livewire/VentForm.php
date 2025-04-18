<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fournisseur;
use App\Models\Verre;
use App\Models\Lentille;
use App\Models\Monture;
use App\Models\Vent;
use App\Models\OpticienInfo;
use Illuminate\Support\Facades\DB;

class VentForm extends Component
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

    protected $rules = [
        'date' => 'required|date',
        'fournisseur_id' => 'required|exists:fournisseurs,id',
        'notes' => 'nullable|string',
        'verreRows.*.id' => 'required|exists:verres,id',
        'verreRows.*.quantite' => 'required|integer|min:1',
        'verreRows.*.prix_unitaire' => 'required|numeric|min:0',
        'lentilleRows.*.id' => 'required|exists:lentilles,id',
        'lentilleRows.*.quantite' => 'required|integer|min:1',
        'lentilleRows.*.prix_unitaire' => 'required|numeric|min:0',
        'montureRows.*.id' => 'required|exists:montures,id',
        'montureRows.*.quantite' => 'required|integer|min:1',
        'montureRows.*.prix_unitaire' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->fournisseurs = Fournisseur::all();
        $this->verres = Verre::all();
        $this->lentilles = Lentille::all();
        $this->montures = Monture::all();
        
        $this->date = date('Y-m-d');
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
        $this->calculateTotals();
    }

    public function addLentilleRow()
    {
        $this->lentilleRows[] = [
            'id' => '',
            'quantite' => 1,
            'prix_unitaire' => 0,
            'total' => 0
        ];
        $this->calculateTotals();
    }

    public function addMontureRow()
    {
        $this->montureRows[] = [
            'id' => '',
            'quantite' => 1,
            'prix_unitaire' => 0,
            'total' => 0
        ];
        $this->calculateTotals();
    }

    public function removeVerreRow($index)
    {
        if (count($this->verreRows) > 1) {
            unset($this->verreRows[$index]);
            $this->verreRows = array_values($this->verreRows);
            $this->calculateTotals();
        }
    }

    public function removeLentilleRow($index)
    {
        if (count($this->lentilleRows) > 1) {
            unset($this->lentilleRows[$index]);
            $this->lentilleRows = array_values($this->lentilleRows);
            $this->calculateTotals();
        }
    }

    public function removeMontureRow($index)
    {
        if (count($this->montureRows) > 1) {
            unset($this->montureRows[$index]);
            $this->montureRows = array_values($this->montureRows);
            $this->calculateTotals();
        }
    }

    public function updated($name, $value)
    {
        // Handle product selection
        $parts = explode('.', $name);
        if (count($parts) === 3 && $parts[2] === 'id') {
            $rowType = $parts[0];
            $index = $parts[1];
            
            // Get the default price based on the selected product
            switch ($rowType) {
                case 'verreRows':
                    if ($verre = Verre::find($value)) {
                        $this->verreRows[$index]['prix_unitaire'] = $verre->prix_vente;
                    }
                    break;
                case 'lentilleRows':
                    if ($lentille = Lentille::find($value)) {
                        $this->lentilleRows[$index]['prix_unitaire'] = $lentille->prix_vente;
                    }
                    break;
                case 'montureRows':
                    if ($monture = Monture::find($value)) {
                        $this->montureRows[$index]['prix_unitaire'] = $monture->prix_vente;
                    }
                    break;
            }
        }
        
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        // Calculate totals for verres
        foreach ($this->verreRows as $index => $row) {
            $quantite = intval($row['quantite'] ?? 0);
            $prix = floatval($row['prix_unitaire'] ?? 0);
            $this->verreRows[$index]['total'] = $quantite * $prix;
        }

        // Calculate totals for lentilles
        foreach ($this->lentilleRows as $index => $row) {
            $quantite = intval($row['quantite'] ?? 0);
            $prix = floatval($row['prix_unitaire'] ?? 0);
            $this->lentilleRows[$index]['total'] = $quantite * $prix;
        }

        // Calculate totals for montures
        foreach ($this->montureRows as $index => $row) {
            $quantite = intval($row['quantite'] ?? 0);
            $prix = floatval($row['prix_unitaire'] ?? 0);
            $this->montureRows[$index]['total'] = $quantite * $prix;
        }

        // Calculate grand total
        $this->grandTotal = 0;
        foreach ($this->verreRows as $row) {
            $this->grandTotal += floatval($row['total'] ?? 0);
        }
        foreach ($this->lentilleRows as $row) {
            $this->grandTotal += floatval($row['total'] ?? 0);
        }
        foreach ($this->montureRows as $row) {
            $this->grandTotal += floatval($row['total'] ?? 0);
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->calculateTotals(); // Ensure totals are up-to-date before saving

        DB::beginTransaction();
        try {
            // Get active OpticienInfo
            $opticienInfo = OpticienInfo::where('is_active', true)->first();

            // Create the Vent record
            $vent = Vent::create([
                'date' => $this->date,
                'fournisseur_id' => $this->fournisseur_id,
                'notes' => $this->notes,
                'total' => $this->grandTotal, // Changed from montant_total to total to match your schema
                'opticien_info_id' => $opticienInfo ? $opticienInfo->id : null
            ]);

            // Attach verres with their totals
            foreach ($this->verreRows as $row) {
                if (!empty($row['id'])) {
                    $total = intval($row['quantite']) * floatval($row['prix_unitaire']);
                    $vent->verres()->attach($row['id'], [
                        'quantite' => intval($row['quantite']),
                        'prix_unitaire' => floatval($row['prix_unitaire']),
                        'total' => $total
                    ]);
                }
            }

            // Attach lentilles with their totals
            foreach ($this->lentilleRows as $row) {
                if (!empty($row['id'])) {
                    $total = intval($row['quantite']) * floatval($row['prix_unitaire']);
                    $vent->lentilles()->attach($row['id'], [
                        'quantite' => intval($row['quantite']),
                        'prix_unitaire' => floatval($row['prix_unitaire']),
                        'total' => $total
                    ]);
                }
            }

            // Attach montures with their totals
            foreach ($this->montureRows as $row) {
                if (!empty($row['id'])) {
                    $total = intval($row['quantite']) * floatval($row['prix_unitaire']);
                    $vent->montures()->attach($row['id'], [
                        'quantite' => intval($row['quantite']),
                        'prix_unitaire' => floatval($row['prix_unitaire']),
                        'total' => $total
                    ]);
                }
            }

            DB::commit();
            
            session()->flash('success', 'Vente enregistrée avec succès.');
            return redirect()->route('vent.index');

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error('Error creating vent: ' . $e->getMessage());
            session()->flash('error', 'Erreur lors de l\'enregistrement de la vente.');
        }
    }

    public function render()
    {
        return view('livewire.vent-form');
    }
} 