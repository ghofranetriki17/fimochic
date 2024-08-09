<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Produit;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $galleries = Gallery::with('produit')->get();
        return view('produits.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $produits = Produit::all();
        return view('galleries.create', compact('produits'));
    }

    /**
     * Stocke une nouvelle image dans la galerie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'type' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img'), $imageName);

        Gallery::create([
            'produit_id' => $request->produit_id,
            'type' => $request->type,
            'image' => $imageName,
        ]);

        return redirect()->route('galleries.create')->with('success', 'Image ajoutée avec succès.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     */
    public function edit(Gallery $gallery)
    {
        $produits = Produit::all();
        return view('galleries.edit', compact('gallery', 'produits'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     */
   public function update(Request $request, Gallery $gallery)
{
    $request->validate([
        'produit_id' => 'required|exists:produits,id',
        'type' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $gallery->produit_id = $request->produit_id;
    $gallery->type = $request->type;
    // Vérifier si une nouvelle image a été téléchargée
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si nécessaire
        if ($gallery->image) {
            \File::delete(public_path('img/' . $gallery->image));
        }

        // Sauvegarder la nouvelle image
        $photo = $request->file('image');
        $photoName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('img'), $photoName);
        $gallery->image = $photoName; // Mettre à jour le nom de l'image
    }
    $gallery->save();

    return redirect()->route('produits.index')->with('success', 'Image mise à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Image supprimée avec succès.');
    }
}
