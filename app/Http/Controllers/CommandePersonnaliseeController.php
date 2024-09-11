<?php

namespace App\Http\Controllers;

use App\Models\CommandePersonnalisee;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientRessourcePersonnalisation;

class CommandePersonnaliseeController extends Controller
{
    public function index()
    {
        $commandes = CommandePersonnalisee::with('client')->get();
        return view('commandespersoonalisse.index', compact('commandes'));
    }

    public function create()
    {    $clientIds = ClientRessourcePersonnalisation::pluck('client_id')->unique();
        $dates = ClientRessourcePersonnalisation::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as date')
        ->distinct()
        ->pluck('date')
        ->sort()
        ->toArray();
        // Récupérer les clients correspondants
        $clients = Client::whereIn('id', $clientIds)->get();
        return view('commandespersoonalisse.create',compact('clients','dates'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'image_reelle' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_perso' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'commande_date' => 'required|date',
            'note' => 'nullable|string',
            'prix_total' => 'required|numeric',
            'adresse' => 'required|string',
            'methode_paiement' => 'required|string',
        ]);
    
        // Initialiser les noms des fichiers à null
        $imageReelleName = null;
        $imagePersoName = null;
    
        // Traitement de l'image réelle
        if ($request->hasFile('image_reelle')) {
            $imageReelle = $request->file('image_reelle');
            $imageReelleName = time() . '_reelle.' . $imageReelle->getClientOriginalExtension();
            $imageReelle->move(public_path('img'), $imageReelleName);
        }
    
        // Traitement de l'image personnalisée
        if ($request->hasFile('image_perso')) {
            $imagePerso = $request->file('image_perso');
            $imagePersoName = time() . '_perso.' . $imagePerso->getClientOriginalExtension();
            $imagePerso->move(public_path('img'), $imagePersoName);
        }
    
        // Créer une nouvelle commande personnalisée
        $commande = new CommandePersonnalisee();
        $commande->client_id = $request->client_id;
        $commande->image_reelle = $imageReelleName;
        $commande->image_perso = $imagePersoName;
        $commande->commande_date = $request->commande_date;
        $commande->note = $request->note;
        $commande->prix_total = $request->prix_total;
        $commande->adresse = $request->adresse;
        $commande->methode_paiement = $request->methode_paiement;
        $commande->save();
    
        return redirect()->route('commandespersoonalisse.index')->with('success', 'Commande personnalisée créée avec succès.');
    }
    

    public function show(CommandePersonnalisee $commandespersoonalisse)
    {
        return view('commandespersoonalisse.show', compact('commandespersoonalisse'));
    }

    public function edit($id)
    {
        $commande = CommandePersonnalisee::findOrFail($id); // Récupère la commande à éditer
        $clients = Client::all(); // Récupère tous les clients pour les options de sélection
    
        // Passe les données à la vue d'édition
        return view('commandespersoonalisse.edit', [
            'commande' => $commande,
            'clients' => $clients
        ]);
    }
    
  // CommandePersonnaliseeController.php

public function update(Request $request, $id)
{
    // Trouver la commande personnalisée par ID
    $commande = CommandePersonnalisee::findOrFail($id);

    // Mettre à jour les champs nécessaires
    $commande->note = $request->input('note');
    $commande->adresse = $request->input('adresse');
    // Ajoutez d'autres champs ici si nécessaire

    // Sauvegarder les changements
    $commande->save();

    // Rediriger avec un message de succès
    return redirect()->route('panier.index')
                     ->with('success', 'Commande personnalisée mise à jour avec succès.');
}
public function updateAdmin(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'image_reelle' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image_perso' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'commande_date' => 'required|date',
        'note' => 'nullable|string',
        'prix_total' => 'required|numeric',
        'adresse' => 'required|string',
        'methode_paiement' => 'required|string',
    ]);

    // Trouver la commande personnalisée par ID
    $commande = CommandePersonnalisee::findOrFail($id);
    $imageReelleName = $commande->image_reelle;
    $imagePersoName = $commande->image_perso;

    if ($request->hasFile('image_reelle')) {
        // Supprimer l'ancienne image si elle existe
        if ($imageReelleName) {
            @unlink(public_path('img/' . $imageReelleName));
        }
        $imageReelle = $request->file('image_reelle');
        $imageReelleName = time() . '_reelle.' . $imageReelle->getClientOriginalExtension();
        $imageReelle->move(public_path('img'), $imageReelleName);
    }

    if ($request->hasFile('image_perso')) {
        // Supprimer l'ancienne image si elle existe
        if ($imagePersoName) {
            @unlink(public_path('img/' . $imagePersoName));
        }
        $imagePerso = $request->file('image_perso');
        $imagePersoName = time() . '_perso.' . $imagePerso->getClientOriginalExtension();
        $imagePerso->move(public_path('img'), $imagePersoName);
    }

    // Mettre à jour les champs nécessaires
    $commande->client_id = $request->client_id;
    $commande->image_reelle = $imageReelleName;
    $commande->image_perso = $imagePersoName;
    $commande->commande_date = $request->commande_date;
    $commande->note = $request->note;
    $commande->adresse = $request->adresse;
    $commande->prix_total = $request->prix_total;
    $commande->methode_paiement = $request->methode_paiement;
    $commande->save();

    // Rediriger avec un message de succès
    return redirect()->route('commandespersoonalisse.index')
                     ->with('success', 'Commande personnalisée mise à jour avec succès.');
}


    public function destroy(CommandePersonnalisee $commandespersoonalisse)
    {
        $commandespersoonalisse->delete();

        return redirect()->route('commandespersoonalisse.index')->with('success', 'Commande personnalisée supprimée avec succès.');
    }
}
