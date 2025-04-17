<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'fournisseur_id',
        'notes',
        'total'
    ];

    protected $casts = [
        'date' => 'date',
        'total' => 'decimal:2'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function verres()
    {
        return $this->belongsToMany(Verre::class, 'vent_verre')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }

    public function lentilles()
    {
        return $this->belongsToMany(Lentille::class, 'vent_lentille')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }

    public function montures()
    {
        return $this->belongsToMany(Monture::class, 'vent_monture')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }
}
