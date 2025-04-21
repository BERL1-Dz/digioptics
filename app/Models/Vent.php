<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vent extends Model
{
    use HasFactory;

    protected $fillable = [
        'fournisseur_id',
        'monture_id',
        'verre_id',
        'lentille_id',
        'total',
        'date_vente',
        'notes'
    ];

    protected $casts = [
        'date_vente' => 'date',
        'total' => 'decimal:2'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vent) {
            if (empty($vent->date_vente)) {
                $vent->date_vente = now();
            }
        });
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function monture()
    {
        return $this->belongsTo(Monture::class);
    }

    public function verre()
    {
        return $this->belongsTo(Verre::class);
    }

    public function lentille()
    {
        return $this->belongsTo(Lentille::class);
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

    public function opticienInfo()
    {
        return $this->belongsTo(OpticienInfo::class, 'opticien_info_id');
    }
}
