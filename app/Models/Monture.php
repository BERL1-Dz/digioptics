<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monture extends Model
{
    use HasFactory;

    public function fournisseurs
    {
      // code...
      public function fournisseur()
      {
        // code...
        return $this->belongsTo(Fournisseur::class);
      }
    }
}
