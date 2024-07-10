<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Valeur;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Affiche une liste des produits.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Stocke un nouveau produit avec ses valeurs associées.
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
            'valeur_id.*' => 'exists:valeurs,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $produit = Produit::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'qte_dispo' => $request->qte_dispo,
            'type' => $request->type,
            'date_ajout' => $request->date_ajout,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        if ($request->has('valeur_id')) {
            $produit->valeurs()->attach($request->valeur_id);
        }

        return redirect()->route('produits.index')
                         ->with('success', 'Produit créé avec succès.');
    }
}
