<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ligneCmd;

class LigneCmdController extends Controller
{
    /**
     * Afficher la liste des lignes de commande.
     */
    public function index()
    {
        $lignesCommande = ligneCmd::all();
        return view('lignesCommande.index', compact('lignesCommande'));
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ligne de commande.
     */
    public function create()
    {
        return view('lignesCommande.create');
    }

    /**
     * Enregistrer une nouvelle ligne de commande.
     */
    public function store(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        ligneCmd::create($request->all());

        return redirect()->route('lignesCommande.index')->with('success', 'Ligne de commande ajoutée avec succès.');
    }

    /**
     * Afficher une ligne de commande spécifique.
     */
    public function show(ligneCmd $ligneCmd)
    {
        return view('lignesCommande.show', compact('ligneCmd'));
    }

    /**
     * Afficher le formulaire de modification d'une ligne de commande.
     */
    public function edit(ligneCmd $ligneCmd)
    {
        return view('lignesCommande.edit', compact('ligneCmd'));
    }

    /**
     * Mettre à jour une ligne de commande existante.
     */
    public function update(Request $request, ligneCmd $ligneCmd)
    {
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $ligneCmd->update($request->all());

        return redirect()->route('lignesCommande.index')->with('success', 'Ligne de commande mise à jour avec succès.');
    }

    /**
     * Supprimer une ligne de commande.
     */
    public function destroy(ligneCmd $ligneCmd)
    {
        $ligneCmd->delete();

        return redirect()->route('lignesCommande.index')->with('success', 'Ligne de commande supprimée avec succès.');
    }
}
