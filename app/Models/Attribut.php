<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribut extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function valeurs()
    {
        return $this->hasMany(Valeur::class);
    }
}