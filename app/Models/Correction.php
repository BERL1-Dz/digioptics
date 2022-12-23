<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Correction extends Model
{
    use HasFactory;

    public function correction()
    {
      // code...
      return $this->belongsTo(Patient::class, "patient_id");
    }

    protected $fillabel =['nom','prenom','age'];
}
