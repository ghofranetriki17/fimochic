<?php

namespace App\Http\Controllers;

use App\Models\RessourcePersonnalisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RessourcePersonnalisationController extends Controller
{
    /**
     * Affiche la liste des ressources personnalisées.
     *
     */
    public function index()
    {
        $ressources = RessourcePersonnalisation::all();
        return view('ressources_personnalisation.index', compact('ressources'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource personnalisée.
     *
     */
    public function create()
    {
        return view('ressources_personnalisation.create');
    }

    /**
     * Stocke une nouvelle ressource personnalisée dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'cat' => 'required|string|max:255',

            'prix' => 'required|numeric'
        ]);

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'), $photoName);
        }
  // Créer la ressource
  $ressource = new RessourcePersonnalisation();
  $ressource->nom = $request->nom;
  $ressource->prix = $request->prix;
  $ressource->type = $request->type;
  $ressource->cat = $request->cat;

  $ressource->image = $photoName; // Assigner le nom du fichier si présent
  $ressource->save();

   

        return redirect()->route('ressources_personnalisation.index')->with('success', 'Ressource ajoutée avec succès.');
    }

    public function edit(RessourcePersonnalisation $ressource_personnalisation)
    {
        return view('ressources_personnalisation.edit', compact('ressource_personnalisation'));
    }
    
    /**
     * Met à jour une ressource personnalisée existante dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RessourcePersonnalisation  $ressource_personnalisation
     */
    public function update(Request $request, RessourcePersonnalisation $ressource_personnalisation)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'cat' => 'required|string|max:255',

            'prix' => 'required|numeric'
        ]);
    
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image si elle existe
            if ($ressource_personnalisation->image) {
                Storage::disk('public')->delete('img/' . $ressource_personnalisation->image);
            }
    
            // Enregistrer la nouvelle image
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'), $photoName);
            $ressource_personnalisation->image = $photoName;
        }
        $ressource_personnalisation->cat = $request->cat;

        $ressource_personnalisation->nom = $request->nom;
        $ressource_personnalisation->type = $request->type;
        $ressource_personnalisation->prix = $request->prix;
        $ressource_personnalisation->save();
    
        return redirect()->route('ressources_personnalisation.index')->with('success', 'Ressource mise à jour avec succès.');
    }
}
