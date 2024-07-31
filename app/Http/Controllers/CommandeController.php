<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\commande;
use App\Models\Panier;
use App\Models\ligneCmd; // Assurez-vous que ce modèle existe

class CommandeController extends Controller
{
    /**
     * Afficher les commandes du client connecté.
     */
    public function index()
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour voir vos commandes.');
        }

        // Obtenez l'identifiant du client connecté
        $clientId = Auth::user()->client->id;

        // Récupérez les commandes du client connecté
        $commandes = Commande::where('client_id', $clientId)->with('lignesCommande')->get();

        return view('commandes.index', compact('commandes'));
    }

    /**
     * Créer une nouvelle commande à partir du panier.
     */
    public function store(Request $request)
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour passer une commande.');
        }
    
        // Obtenez l'identifiant du client connecté
        $clientId = Auth::user()->client->id;
    
        // Récupérez les articles du panier du client connecté
        $panier = Panier::where('client_id', $clientId)->get();
    
        if ($panier->isEmpty()) {
            return redirect()->route('panier.index')->with('message', 'Votre panier est vide.');
        }
    
        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->client_id = $clientId;
        $commande->date_cmd = now();
        $commande->date_estimee_liv = now()->addDays(7); // Par exemple, 7 jours après la commande
        $commande->etat = false;
        
        $commande->save();
    
        // Ajouter les articles du panier à la commande
        foreach ($panier as $item) {
            $ligneCommande = new ligneCmd();
            $ligneCommande->commande_id = $commande->id;
            $ligneCommande->produit_id = $item->produit_id;
            $ligneCommande->qtecmnd = $item->quantite; // Utiliser qtecmnd au lieu de quantite
            $ligneCommande->save();
        }
    
        // Vider le panier
        Panier::where('client_id', $clientId)->delete();
    
        // Rediriger vers l'index du panier avec un message de succès
        return redirect()->route('panier.index')->with('success', 'Votre commande a été passée avec succès !');
    }
    
    
}
