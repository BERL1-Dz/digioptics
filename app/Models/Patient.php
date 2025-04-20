<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'telephone',
        'email',
        'groupe_sanguin',
        'allergies',
        'antecedents',
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    public function corrections()
    {
      // code...
      return $this->hasMany(Correction::class, 'patient_id');
    }

    public function factures()
    {
      // code ...
      return $this->hasMany(Facture::class, 'patient_id');
    }

    public function recettes()
    {
        return $this->hasMany(Recette::class, 'patient_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }
}
