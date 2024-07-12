<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Attribut;
use App\Models\Valeur;

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
        // Récupérer tous les produits avec leurs attributs et valeurs associées, et les grouper par type
        $produitsParType = Produit::with('valeurs')->get()->groupBy('type');
    
        return view('produits.index', compact('produitsParType'));
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
         // Validation des données du formulaire
         $request->validate([
            'name' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'qte_dispo' => 'required|integer',
            'type' => 'nullable|string|max:255',
            'date_ajout' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attribute_values' => 'required|array',
        ]);


        $photo = $request->file('photo');
        $photoName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('img'),$photoName);


        // Création du produit
        $produit = new Produit();
        $produit->name = $request->name;
        $produit->prix = $request->prix;
        $produit->qte_dispo = $request->qte_dispo;
        $produit->type = $request->type;
        $produit->date_ajout = $request->date_ajout;
        $produit->description = $request->description;
        $produit->image = $photoName;
        $produit->save();

         // Association des valeurs sélectionnées au produit
         foreach ($request->attribute_values as $attribut_id => $valeur_ids) {
            foreach ($valeur_ids as $valeur_id) {
                $produit->valeurs()->attach($valeur_id);
            }
        }

        // Rediriger avec un message de succès
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
            'qte_dispo' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);
    
        $produit = Produit::findOrFail($id);
    
        // Mettre à jour uniquement les champs modifiés
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->qte_dispo = $request->qte_dispo;
    
        // Sauvegarder les modifications
        $produit->save();
    
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
