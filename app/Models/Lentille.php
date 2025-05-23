<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lentille extends Model
{
    use HasFactory;

    public function fournisseur()
    {
      // code...
      return $this->belongsTo(Fournisseur::class, 'code_fournisseur', 'id');
    }
}
