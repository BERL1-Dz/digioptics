<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'adresse',
        'ville',
        'pays',
        'code_postal',
        'notes'
    ];

    public function montures()
    {
        return $this->hasMany(Monture::class, 'code_fournisseur', 'id');
    }

    public function verres()
    {
        return $this->hasMany(Verre::class, 'code_fournisseur');
    }

    public function lentilles()
    {
        //
        return $this->hasMany(Lentille::class, 'code_fournisseur');
    }

    public function vents()
    {
        return $this->hasMany(Vent::class);
    }
}
