<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

     public function montures(){
      return  $this->hasMany(Monture::class,'code_fournisseur');
    }

    public function verres(){
      return  $this->hasMany(Verre::class,'code_fournisseur');
    }

     public function lentilles()
    {
      //
      return $this->hasMany(Lentille::class);
    }
}
