<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'fournisseur_id',
        'total',
        'notes'
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
        return $this->belongsToMany(Verre::class, 'achat_verre')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }

    public function lentilles()
    {
        return $this->belongsToMany(Lentille::class, 'achat_lentille')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }

    public function montures()
    {
        return $this->belongsToMany(Monture::class, 'achat_monture')
            ->withPivot('quantite', 'prix_unitaire', 'total')
            ->withTimestamps();
    }
}
