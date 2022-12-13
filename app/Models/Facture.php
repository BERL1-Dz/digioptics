<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $casts = [
        "ref" => "array",
        "designation" => "array",
        "quantite" => "array",
        "p_unitaire" => "array",
    ];
}
