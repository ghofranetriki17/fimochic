<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;


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
            'user_id' => 'required|exists:users,id',
            'prenom' => 'nullable|string|max:255',
            'nom' => 'nullable|string|max:255',
            'mail' => 'nullable|email|max:255',
            'age' => 'nullable|integer|min:0',
            'numero_tel' => 'nullable|numeric',
            'sexe' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);
    
        Client::create([
            'user_id' => $request->user_id,
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
    }/*********************** */

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
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        'preNom' => 'nullable|string|max:255',
        'nom' => 'nullable|string|max:255',
        'mail' => 'nullable|email|max:255',
        'age' => 'nullable|integer|min:0',
        'numeroTel' => 'nullable|numeric',
        'sexe' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')
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
}
