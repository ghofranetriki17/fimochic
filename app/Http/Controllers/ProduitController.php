<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Attribut;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Affiche une liste des ressources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Récupérer tous les produits avec leurs valeurs associées
        $produits = Produit::all();
    
        return view('produits.index', compact('produits'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Récupérer tous les attributs avec leurs valeurs associées
        $attributs = Attribut::with('valeurs')->get();
    
        return view('produits.create', compact('attributs'));
    }

    /**
     * Stocke une ressource nouvellement créée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prix' => 'nullable|numeric',
            'qte_dispo' => 'nullable|integer',
            'type' => 'nullable|string|max:255',
            'date_ajout' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'valeurs' => 'nullable|array', // Champ pour les valeurs d'attribut sélectionnées
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Création du produit
        $produit = Produit::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'qte_dispo' => $request->qte_dispo,
            'type' => $request->type,
            'date_ajout' => $request->date_ajout,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        // Attacher les valeurs d'attribut sélectionnées au produit
        if ($request->has('valeurs')) {
            $produit->valeurs()->attach($request->valeurs);
        }
    
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        $valeurs = $produit->valeurs;

        return view('produits.show', compact('produit', 'valeurs'));
    }


    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prix' => 'nullable|numeric|min:0',
            'qte_dispo' => 'nullable|integer|min:0',
            'type' => 'nullable|string|max:255',
            'date_ajout' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produit = Produit::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $produit->image = $imagePath;
        }

        $produit->update([
            'name' => $request->name,
            'prix' => $request->prix,
            'qte_dispo' => $request->qte_dispo,
            'type' => $request->type,
            'date_ajout' => $request->date_ajout,
            'description' => $request->description,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
  

}
