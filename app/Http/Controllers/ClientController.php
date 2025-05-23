<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;
use App\Models\commande;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Ajoutez cette ligne

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Affiche le formulaire de création d'un client.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Stocke un nouveau client dans la base de données.
     *
      * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'nullable|string|max:255',
            'nom' => 'nullable|string|max:255',
            'mail' => 'nullable|email|max:255',
            'age' => 'nullable|integer|min:0',
            'numero_tel' => 'nullable|numeric',
            'sexe' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'password' => 'required|string|min:8', // Validation du mot de passe requise
        ]);
    
        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->nom, // Assurez-vous que 'name' est correctement défini dans votre modèle User
            'email' => $request->mail,
            'password' => Hash::make($request->password),
        ]);
    
        // Création du client associé à l'utilisateur
        $client = Client::create([
            'user_id' => $user->id, // Assurez-vous que 'user_id' est correctement défini dans votre modèle Client
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'mail' => $request->mail,
            'age' => $request->age,
            'numero_tel' => $request->numero_tel,
            'gender' => $request->sexe,
            'adresse' => $request->adresse,
        ]);
    
        return redirect()->route('clients.index')
            ->with('success', 'Client ajouté avec succès.');
    }
    

    /**
     * Affiche les détails d'un client spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Affiche le formulaire pour éditer un client spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Met à jour un client spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */public function update(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'preNom' => 'nullable|string|max:255',
        'nom' => 'nullable|string|max:255',
        'mail' => 'nullable|email|max:255',
        'age' => 'nullable|integer|min:0',
        'numeroTel' => 'nullable|numeric',
        'sexe' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:255',
    ]);

    // Trouver le client par ID
    $client = Client::findOrFail($id);

    // Mise à jour des informations du client
    $client->update([
        'preNom' => $request->input('preNom', $client->preNom),
        'nom' => $request->input('nom', $client->nom),
        'mail' => $request->input('mail', $client->mail),
        'age' => $request->input('age', $client->age),
        'numeroTel' => $request->input('numeroTel', $client->numeroTel),
        'sexe' => $request->input('sexe', $client->sexe),
        'adresse' => $request->input('adresse', $client->adresse),
    ]);

    // Redirection avec message de succès
    return redirect()->route('clients.compte')
        ->with('success', 'Client mis à jour avec succès.');
}


    /**
     * Supprime un client spécifique de la base de données.
     *
      * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }
    public function compte()
    {
        $client = Auth::user()->client; // Supposons que vous avez une relation entre User et Client
     
        if (!$client) {
            return redirect()->route('clients.index')->with('error', 'Client introuvable.');
        }
    
        // Récupérer les commandes du client
        $commandes = $client->commandes;
    
        return view('clients.compte', compact('client', 'commandes'));
    }

    

}
