<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Panier; // Assurez-vous que ce modèle existe
use App\Models\Produit; // Assurez-vous que ce modèle existe

class PanierController extends Controller
{
    /**
     * Afficher le panier du client connecté.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour voir votre panier.');
        }
    
        $clientId = Auth::user()->client->id;
    
        $cart = Panier::where('client_id', $clientId)->with('produit')->get();
    
        $total = $cart->sum(function ($item) {
            return $item->quantite * $item->getPrix();
        });
    
        return view('panier.index', compact('cart', 'total'));
    }
    
    /**
     * Ajouter ou mettre à jour un produit dans le panier.
     */
    public function store(Request $request)
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour ajouter des produits au panier.');
        }

        // Obtenez l'identifiant du client connecté
        $clientId = Auth::user()->client->id;
    
        // Valider la requête
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produitId = $request->input('produit_id');
        $quantite = $request->input('quantite');

        // Ajouter ou mettre à jour le produit dans le panier
        Panier::updateOrCreate(
            ['client_id' => $clientId, 'produit_id' => $produitId],
            ['quantite' => \DB::raw('quantite + ' . $quantite)]
        );

        return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier avec succès.');
    }

    /**
     * Mettre à jour la quantité d'un produit dans le panier.
     */
    public function update(Request $request, Panier $panier)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Vous devez vous connecter pour mettre à jour votre panier.');
    }

    $request->validate([
        'action' => 'required|string|in:increment,decrement',
    ]);

    if ($request->action === 'increment') {
        $panier->quantite += 1;  // Incrémentation par 1
    } elseif ($request->action === 'decrement') {
        $panier->quantite = max(1, $panier->quantite - 1);  // Décrémentation par 1
    }

    $panier->save();

    return redirect()->route('panier.index')->with('success', 'Quantité mise à jour avec succès.');
}


    /**
     * Supprimer un produit du panier.
     */
    public function destroy(Request $request, $id)
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour gérer votre panier.');
        }
    
        // Obtenez l'identifiant du client connecté
        $clientId = Auth::user()->client->id;
    
        // Trouvez l'article du panier
        $panierItem = Panier::where('client_id', $clientId)->where('id', $id)->first();
    
        // Vérifiez que l'article existe et appartient au client connecté
        if (!$panierItem) {
            return redirect()->route('panier.index')->with('message', 'Article non trouvé dans votre panier.');
        }
    
        // Supprimez l'article du panier
        $panierItem->delete();
    
        return redirect()->route('panier.index')->with('success', 'Produit supprimé du panier avec succès.');
    }
    
}
