<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model 
{
    use HasFactory;

    protected $fillable = [
        'name', 'prix', 'qte_dispo', 'type', 'date_ajout', 'description', 'image',
    ];

    public function valeurs()
    {
        return $this->belongsToMany(Valeur::class, 'produit_valeurs');
    }

    public function ligneCmds()
    {
        return $this->hasMany(LigneCmd::class);
    }
}
