<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpticienInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'adresse',
        'code_postal',
        'ville',
        'telephone',
        'email',
        'site_web',
        'numero_finess',
        'numero_siret',
        'tva_numero',
        'logo_path',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
