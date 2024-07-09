<?php

namespace App\Http\Controllers;

use App\Models\Attribut;
use App\Models\Valeur;
use Illuminate\Http\Request;

class ValeurController extends Controller
{
    /**
     * Affiche une liste des valeurs pour un attribut donné.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Attribut $attribut)
    {
        // Récupérer toutes les valeurs associées à cet attribut
        $valeurs = $attribut->valeurs()->orderBy('created_at', 'DESC')->get();

        // Retourner une vue avec les valeurs
        return view('produits.index', compact('attribut', 'valeurs'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle valeur pour un attribut donné.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Attribut $attribut)
    {
        return view('produits.create', compact('attribut'));
    }

    /**
     * Stocke une nouvelle valeur pour un attribut donné dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Attribut $attribut)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Créer une nouvelle valeur pour cet attribut
        $attribut->valeurs()->create([
            'nom' => $request->nom,
        ]);

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index', $attribut)->with('success', 'Valeur créée avec succès.');
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Valeur $valeur)
    {
        return view('produits.show', compact('valeur'));
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Valeur $valeur)
    {
        return view('produits.edit', compact('valeur'));
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Valeur $valeur)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Mettre à jour la valeur
        $valeur->update([
            'nom' => $request->nom,
        ]);

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index', $valeur->attribut)->with('success', 'Valeur mise à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Valeur $valeur)
    {
        // Récupérer l'attribut associé à cette valeur
        $attribut = $valeur->attribut;

        // Supprimer la valeur
        $valeur->delete();

        // Rediriger vers les produits avec un message de succès
        return redirect()->route('produits.index', $attribut)->with('success', 'Valeur supprimée avec succès.');
    }
}
