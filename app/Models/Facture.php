<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $casts = [
        "ref" => "array",
        "designation" => "array",
        "quantite" => "array",
        "p_unitaire" => "array",
        "montant" => "array",
    ];

    public function patient()
    {
        // code ...
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
