<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitValeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id', 'valeur_id', 'image', 'prix',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function valeur()
    {
        return $this->belongsTo(Valeur::class);
    }
}
