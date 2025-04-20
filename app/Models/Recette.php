<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_nom',
        'client_prenom',
        'client_telephone',
        // Vision de Loin - Right Eye
        'oeil_droit_sphere',
        'oeil_droit_cylindre',
        'oeil_droit_axe',
        // Vision de Loin - Left Eye
        'oeil_gauche_sphere',
        'oeil_gauche_cylindre',
        'oeil_gauche_axe',
        // Vision de Près - Right Eye
        'oeil_droit_sphere_pres',
        'oeil_droit_cylindre_pres',
        'oeil_droit_axe_pres',
        'oeil_droit_addition',
        // Vision de Près - Left Eye
        'oeil_gauche_sphere_pres',
        'oeil_gauche_cylindre_pres',
        'oeil_gauche_axe_pres',
        'oeil_gauche_addition',
        // Other fields
        'type_verre',
        'monture_id',
        'total',
        'montant_paye',
        'reste_a_payer',
        'notes',
        'patient_id'
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'montant_paye' => 'decimal:2',
        'reste_a_payer' => 'decimal:2'
    ];

    public function monture()
    {
        return $this->belongsTo(Monture::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getFormattedTotalAttribute()
    {
        return number_format($this->total, 2, ',', ' ');
    }

    public function getFormattedMontantPayeAttribute()
    {
        return number_format($this->montant_paye, 2, ',', ' ');
    }

    public function getFormattedResteAPayerAttribute()
    {
        return number_format($this->reste_a_payer, 2, ',', ' ');
    }
} 