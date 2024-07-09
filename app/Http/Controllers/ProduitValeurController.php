<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Valeur;
use Illuminate\Http\Request;

class ProduitValeurController extends Controller
{
    /**
     * Affiche une liste des valeurs associées à un produit donné.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Produit $produit)
    {
        // Récupérer toutes les valeurs associées à ce produit
        $valeurs = $produit->valeurs()->orderBy('created_at', 'DESC')->get();

        // Retourner une vue avec les valeurs
        return view('produits.index', compact('produit', 'valeurs'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle association produit-valeur.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Produit $produit)
    {
        // Récupérer toutes les valeurs disponibles pour l'association
        $valeurs = Valeur::all();

        return view('produits.create', compact('produit', 'valeurs'));
    }

    /**
     * Associe une nouvelle valeur à un produit dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Produit $produit)
    {
        // Valider les données du formulaire
        $request->validate([
            'valeur_id' => 'required|exists:valeurs,id',
            'image' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        // Associer une nouvelle valeur au produit
        $produit->valeurs()->attach($request->valeur_id, [
            'image' => $request->image,
            'prix' => $request->prix,
        ]);

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Association produit-valeur créée avec succès.');
    }

    /**
     * Affiche les détails d'une association produit-valeur spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Valeur $valeur)
    {
        return view('produits.show', compact('valeur'));
    }

    /**
     * Affiche le formulaire pour modifier l'association produit-valeur spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Valeur $valeur)
    {
        return view('produits.edit', compact('valeur'));
    }

    /**
     * Met à jour l'association produit-valeur spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Valeur $valeur)
    {
        // Valider les données du formulaire
        $request->validate([
            'image' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        // Mettre à jour l'association produit-valeur
        $valeur->pivot->update([
            'image' => $request->image,
            'prix' => $request->prix,
        ]);

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Association produit-valeur mise à jour avec succès.');
    }

    /**
     * Supprime l'association produit-valeur spécifiée du stockage.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Valeur $valeur)
    {
        // Détacher l'association produit-valeur
        $valeur->pivot->delete();

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Association produit-valeur supprimée avec succès.');
    }
}
