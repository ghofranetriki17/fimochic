<?php

namespace App\Http\Controllers;

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

    /**
     * Stocke une nouvelle ressource dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'couleur' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Traitement de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Créer une nouvelle ressource
        Ressource::create([
            'nom' => $request->nom,
            'quantite' => $request->quantite,
            'couleur' => $request->couleur,
            'type' => $request->type,
            'image' => $imagePath,
        ]);

        // Rediriger vers la liste des ressources avec un message de succès
        return redirect()->route('ressources.index')->with('success', 'Ressource créée avec succès.');
    }

    /**
     * Affiche les détails d'une ressource.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Ressource $ressource)
    {
        return view('ressources.show', compact('ressource'));
    }

    /**
     * Affiche le formulaire d'édition d'une ressource existante.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Ressource $ressource)
    {
        return view('ressources.edit', compact('ressource'));
    }

    /**
     * Met à jour une ressource existante dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ressource $ressource)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'couleur' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Traitement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $ressource->update(['image' => $imagePath]);
        }

        // Mettre à jour la ressource
        $ressource->update($request->except('image'));

        // Rediriger vers la ressource avec un message de succès
        return redirect()->route('ressources.show', $ressource->id)->with('success', 'Ressource mise à jour avec succès.');
    }

    /**
     * Supprime une ressource existante de la base de données.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ressource $ressource)
    {
        $ressource->delete();

        return redirect()->route('ressources.index')->with('success', 'Ressource supprimée avec succès.');
    }
}
