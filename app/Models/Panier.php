<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    // Spécifiez la table associée si le nom ne suit pas la convention
    protected $table = 'panier'; 

    // Les attributs qui sont massivement assignables
    protected $fillable = [
        'client_id',
        'produit_id',
        'quantite',
    ];

    /**
     * Relation avec le modèle Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relation avec le modèle Produit
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
