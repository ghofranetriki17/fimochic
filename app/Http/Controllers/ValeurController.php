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
    public function index()
    {
        // Récupérer tous les attributs avec leurs valeurs associées
        $attributs = Attribut::with('valeurs')->get();
    
        // Retourner la vue avec les attributs et leurs valeurs
        return view('valeurs.index', compact('attributs'));
    }
    /**
     * Affiche le formulaire de création d'une nouvelle valeur pour un attribut donné.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Attribut $attribut)
    {
        return view('valeurs.create', compact('attribut'));
    }

    /**
     * Stocke une nouvelle valeur pour un attribut donné dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'attribut_id' => 'required|exists:attributs,id', // Vérifie que l'attribut_id existe dans la table attributs
        'nom' => 'required|string|max:255',
    ]);

    // Création d'une nouvelle valeur
    $valeur = new Valeur();
    $valeur->attribut_id = $request->attribut_id;
    $valeur->nom = $request->nom;
    $valeur->save();

    // Redirection avec un message de succès
    return redirect()->route('valeurs.index')
                     ->with('success', 'La valeur a été ajoutée avec succès.');
}
    /**
     * Affiche la ressource spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Valeur $valeur)
    {
        return view('valeurs.show', compact('valeur'));
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     *
     * @param  \App\Models\Valeur  $valeur
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Valeur $valeur)
    {
        return view('valeurs.edit', compact('valeur'));
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

        // Rediriger vers les valeurs avec un message de succès
        return redirect()->route('valeurs.index', $valeur->attribut)->with('success', 'Valeur mise à jour avec succès.');
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

        // Rediriger vers les valeurs avec un message de succès
        return redirect()->route('valeurs.index', $attribut)->with('success', 'Valeur supprimée avec succès.');
    }
}
