<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Gallery;
use App\Models\Attribut;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer tous les attributs avec leurs valeurs
        $attributs = Attribut::with('valeurs')->get();
    
        // Construire la requête de filtrage
        $query = Produit::query();
    
        // Appliquer les filtres en fonction des attributs et valeurs
        if ($request->has('filters')) {
            foreach ($request->input('filters') as $attributId => $valeurIds) {
                $query->whereHas('valeurs', function ($query) use ($attributId, $valeurIds) {
                    $query->where('attribut_id', $attributId)
                          ->whereIn('id', $valeurIds);
                });
            }
        }
    
        // Récupérer toutes les galeries
        $galleries = Gallery::all();
    
        // Récupérer les produits filtrés et paginés
        $produits = $query->paginate(12); // Ajustez le nombre par page si nécessaire
    
        return view('boutique.index', compact('produits', 'galleries', 'attributs'));
    }
    
    public function show($id)
    {
        // Récupération d'un produit par son ID
        $produit = Produit::findOrFail($id);
    
        return view('boutique.show', compact('produit'));
    }
}
