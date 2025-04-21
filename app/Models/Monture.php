<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'marque',
        'modele',
        'couleur',
        'taille',
        'prix_achat',
        'prix_vente',
        'quantite',
        'description',
        'image'
    ];

    public function fournisseurs()
    {
        // code...
        return $this->belongsTo(Fournisseur::class,'code_fournisseur', 'id');
    }

    public function corrections()
    {
      // code...
      return $this->hasMany(Correction::class,'monture_id','id');
    }

    public function vents()
    {
        return $this->hasMany(Vent::class);
    }
}
