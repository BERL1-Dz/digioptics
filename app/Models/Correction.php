<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Correction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_vision',
        'date',
        'patient_id',
        'sph_od',
        'sph_og',
        'cly_od',
        'cly_og',
        'axe_od',
        'axe_og',
        'add_od',
        'add_og',
        'PD',
        'Near_Pd',
        'option',
        'monture_id',
        'bc_od',
        'bc_og',
        'dia_od',
        'dia_og',
        'durabilite',
        'confort',
        'option_supp',
        'couleurs',
        'niveau_trans',
        'types',
        'quantite'
    ];

    public function patient()
    {
      // code...
      return $this->belongsTo(Patient::class, "patient_id", 'id');
    }

    public function monture()
    {
      // code
      return $this->belongsTo(Monture::class, 'monture_id', 'id');
    }
}
