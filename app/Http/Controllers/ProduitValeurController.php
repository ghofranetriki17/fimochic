<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Valeur;use App\Models\ProduitValeur;

use Illuminate\Http\Request;

class ProduitValeurController extends Controller
{
    /**
     * Affiche une liste des valeurs associées à un produit donné.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Produit $produit)
    {
        // Récupérer toutes les valeurs associées à ce produit
        $valeurs = $produit->valeurs()->orderBy('created_at', 'DESC')->get();

        // Retourner une vue avec les valeurs
        return view('produits.index', compact('produit', 'valeurs'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle association produit-valeur.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Produit $produit)
    {
        // Récupérer toutes les valeurs disponibles pour l'association
        $valeurs = Valeur::all();

        return view('produits.create', compact('produit', 'valeurs'));
    }

    /**
     * Associe une nouvelle valeur à un produit dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
           // Valider les données du formulaire
    $request->validate([
        'produit_id' => 'required|exists:produits,id',
        'valeur_id' => 'required|exists:valeurs,id',
        'prix' => 'required|numeric',
    ]);

    // Créer une nouvelle entrée dans la table pivot produit_valeurs
    ProduitValeur::create([
        'produit_id' => $request->produit_id,
        'valeur_id' => $request->valeur_id,
        'prix' => $request->prix,
    ]);

       

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }


    // Autres méthodes du contrôleur (show, edit, update, destroy)...
}
