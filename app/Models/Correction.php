<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Correction extends Model
{
    use HasFactory;

    public function patient()
    {
      // code...
      return $this->belongsTo(Patient::class, "patient_id", 'id');
    }

    public function montures()
    {
      // code
      return $this->HasMany(Monture::class, 'monture_id','id');
    }

    protected $fillabel =['nom','prenom','age'];
}
