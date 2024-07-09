<?php

namespace App\Http\Controllers;

use App\Models\Attribut; // Assurez-vous d'importer le modèle Attribut si nécessaire
use Illuminate\Http\Request;

class AttributController extends Controller
{
    /**
     * Affiche une liste des ressources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Récupérer tous les attributs
        $attributs = Attribut::all();
    
        // Retourner une vue avec les attributs
        return view('produits.index', compact('attributs'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $attributs = Attribut::all(); // Récupérer tous les attributs disponibles
        return view('produits.create', compact('attributs'));
    }

    /**
     * Stocke une nouvelle ressource nouvellement créée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Créer un nouvel attribut
        $attribut = Attribut::create([
            'nom' => $request->nom,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Attribut créé avec succès.');
    }


    /**
     * Affiche la ressource spécifiée.
     *
   *@param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Attribut $attribut)
    {
        return view('produits.show', compact('attribut'));
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     *
     * @param  int  $id
    * @return \Illuminate\Contracts\View\View
    */
    public function edit(Attribut $attribut)
    {
        return view('produits.edit', compact('attribut'));
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     *
   * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Attribut $attribut)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Mettre à jour l'attribut
        $attribut->update([
            'nom' => $request->nom,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Attribut mis à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribut $attribut)
    {
        // Supprimer l'attribut
        $attribut->delete();

        // Rediriger avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Attribut supprimé avec succès.');
    }
}

