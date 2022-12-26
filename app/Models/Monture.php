<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monture extends Model
{
    use HasFactory;

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
}
