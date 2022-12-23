<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verre extends Model
{
    use HasFactory;

    public function fournisseur()
    {
      // code...
      return $this->belongsTo(Fournisseur::class, 'code_fournisseur', 'id');

    }
}
