<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


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

}
