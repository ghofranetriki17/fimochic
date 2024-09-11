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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $photoName = null;
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'), $photoName);
        }
    
        // Créer la ressource
        $ressource = new Ressource();
        $ressource->nom = $request->nom;
        $ressource->quantite = $request->quantite;
        $ressource->couleur = $request->couleur;
        $ressource->type = $request->type;
        $ressource->image = $photoName; // Assigner le nom du fichier si présent
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
    public function edit($id)
{
    $ressource = Ressource::findOrFail($id);
    return view('ressources.edit', compact('ressource'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'quantite' => 'required|integer',
        'couleur' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $ressource = Ressource::findOrFail($id);
    $ressource->nom = $request->nom;
    $ressource->quantite = $request->quantite;
    $ressource->couleur = $request->couleur;
    $ressource->type = $request->type;

    // Gérer l'image si elle est mise à jour
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si nécessaire
        if ($ressource->image) {
            Storage::delete('img/' . $ressource->image);
        }
        // Enregistrer la nouvelle image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $imageName);
        $ressource->image = $imageName;
    }

    $ressource->save();

    return redirect()->route('ressources.index')->with('success', 'Ressource mise à jour avec succès !');
}


}