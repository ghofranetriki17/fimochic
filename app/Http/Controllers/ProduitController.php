<?php

namespace App\Http\Controllers;

use App\Models\Produit;
/*use App\Models\Value;
use App\Models\Attribute;*/
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'prix' => 'nullable|numeric',
            'qte_dispo' => 'nullable|integer',
            'type' => 'nullable|string|max:255',
            'date_ajout' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Gestion de l'upload de l'image si fournie
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Création d'un nouveau produit
        $produit = Produit::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'qte_dispo' => $request->qte_dispo,
            'type' => $request->type,
            'date_ajout' => $request->date_ajout,
            'description' => $request->description,
            'image' => $imagePath, // Assurez-vous que $imagePath contient le chemin correct ou est null
        ]);

        // Redirection vers la liste des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    
    /**
     * Display the specified resource.
     *
     *@param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
     
     public function show($id)
     {
         $produit = Produit::find($id);
         return view('produits.show', compact('produit'));
     }
     
    /**

    * @param  int  $id
    * @return \Illuminate\Contracts\View\View
    */
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
    }
    

    /**
     * Met à jour un client spécifique dans la base de données.
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
        'attribute_values.*.nom' => 'required|string|max:255',
    ]);

    $produit = Produit::findOrFail($id);

    // Handle image update if provided
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
     * Supprime un prod spécifique de la base de données.
     *
      * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')
            ->with('success', 'produit supprimé avec succès.');
    }
}

       