<?php
// App\Http\Controllers\CommandeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use App\Models\Panier;
use App\Models\LigneCmd;

class CommandeController extends Controller
{
    // Méthode pour afficher les commandes du client connecté
    public function index()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour voir vos commandes.');
        }
    
        // Obtenez l'utilisateur connecté
        $user = Auth::user();
    
        // Vérifiez si l'utilisateur est un administrateur
        if ($user->type=1) { // Remplacez 'is_admin' par la condition ou le champ qui indique si l'utilisateur est un admin
            // Récupérez toutes les commandes pour les administrateurs
            $commandes = Commande::with('lignesCommande')->get();
        } else {
            // Récupérez les commandes du client connecté pour les clients
            $clientId = $user->client->id;
            $commandes = Commande::where('client_id', $clientId)->with('lignesCommande')->get();
        }
    
        return view('commandes.index', compact('commandes'));
    }

    // Méthode pour créer une nouvelle commande
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour passer une commande.');
        }
    
        $clientId = Auth::user()->client->id;
        $panier = Panier::where('client_id', $clientId)->get();
    
        if ($panier->isEmpty()) {
            return redirect()->route('panier.index')->with('message', 'Votre panier est vide.');
        }
    
        $validated = $request->validate([
            'adresse' => 'required|string|max:255',
            'payment_method' => 'required|in:cash_on_delivery,post,visa',
            'total_price' => 'required|numeric',
        ]);
    
        $commande = new Commande();
        $commande->client_id = $clientId;
        $commande->adresse = $validated['adresse'];
        $commande->mode_paiement = $validated['payment_method'];
        $commande->prix = $validated['total_price'];
        $commande->date_cmd = now();
        $commande->date_estimee_liv = now()->addDays(7);
        $commande->etat = '0';
        $commande->save();
    
        foreach ($panier as $item) {
            $ligneCommande = new LigneCmd();
            $ligneCommande->commande_id = $commande->id;
            $ligneCommande->produit_id = $item->produit_id;
            $ligneCommande->qtecmnd = $item->quantite;
            $ligneCommande->save();
        }
    
        Panier::where('client_id', $clientId)->delete();
    
        return redirect()->route('panier.index')->with('success', 'Votre commande a été passée avec succès !');
    }

    // Méthode pour afficher les détails d'une commande
    public function show($id)
    {
        $commande = Commande::with('lignesCommande.produit')->find($id);

        if (!$commande) {
            return redirect()->route('clients.compte')->with('error', 'Commande introuvable.');
        }

        return view('commandes.show', compact('commande'));
    }

    // Méthode pour afficher les commandes dans le tableau de bord admin
    public function adminIndex()
    {
        $commandes = Commande::with('client')->paginate(10); // Ajoutez la pagination si nécessaire

        return view('commandes.index', compact('commandes'));
    }
    public function edit($id)
    {
        $commande = Commande::find($id);
    
        if (!$commande) {
            return redirect()->route('commandes.index')->with('error', 'Commande introuvable.');
        }
    
        return view('commandes.edit', compact('commande'));
    }
    public function details($id)
{
    $commande = Commande::with('lignesCommande.produit')->find($id);

    if (!$commande) {
        return redirect()->route('clients.compte')->with('error', 'Commande introuvable.');
    }

    return view('commandes.details', compact('commande'));
}

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'date_estimee_liv' => 'required|date',
            'etat' => 'required|in:0,1,2,3,4',
        ]);
    
        $commande = Commande::find($id);
    
        if (!$commande) {
            return redirect()->route('commandes.index')->with('error', 'Commande introuvable.');
        }
    
        // Mettre à jour les informations de la commande
        $commande->date_estimee_liv = $validated['date_estimee_liv'];
        $commande->etat = $validated['etat'];
        $commande->save();
    
        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès !');
    }
    
}
