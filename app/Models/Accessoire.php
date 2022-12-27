<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoire extends Model
{
    use HasFactory;

    public function categorie()
    {
        // code ..
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
    }
}
