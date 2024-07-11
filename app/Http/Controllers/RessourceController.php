<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Affiche une liste des ressources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ressources = Ressource::orderBy('created_at', 'DESC')->get();

        return view('ressources.index', compact('ressources'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ressources.create');
    }
// Récupérer et afficher une ressource spécifique
public function show($id)
{
    $ressource = Ressource::findOrFail($id); // Récupère la ressource par son ID, ou renvoie une erreur 404 si non trouvée

    return view('ressources.show', compact('ressource'));
}

    /**
     * Stocke une nouvelle ressource dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string',
        'quantite' => 'required|integer',
        'couleur' => 'required|string',
        'type' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Gérer l'upload de l'image si elle est présente
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    // Créer la ressource
    $ressource = new Ressource();
    $ressource->nom = $request->nom;
    $ressource->quantite = $request->quantite;
    $ressource->couleur = $request->couleur;
    $ressource->type = $request->type;
    $ressource->image = $imagePath;
    $ressource->save();

    return redirect()->route('ressources.index')->with('success', 'Ressource ajoutée avec succès.');
}
   /**
     * Supprime une ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Récupérer la ressource à supprimer depuis la base de données
        $ressource = Ressource::findOrFail($id);

        // Supprimer l'image associée si elle existe dans le stockage
        if ($ressource->image) {
            Storage::disk('public')->delete($ressource->image);
        }

        // Supprimer la ressource de la base de données
        $ressource->delete();

        return redirect()->route('ressources.index')->with('success', 'Ressource supprimée avec succès.');
    }

}