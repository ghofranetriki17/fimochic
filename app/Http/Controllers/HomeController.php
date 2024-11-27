<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Gallery;
use App\Models\ProductLikeComment;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $desiredValues = ['femme voilée','Tendance/Mode', 'Quotidien', 'Travail/Professionnel'];
    
        // Récupérer les produits qui ont les valeurs désirées
        $products = Produit::whereHas('valeurs', function ($query) use ($desiredValues) {
            $query->whereIn('nom', $desiredValues);
        })->with('valeurs')->get();
    
        // Initialiser un tableau pour les produits groupés
        $groupedProducts = [];
    
        foreach ($products as $produit) {
            foreach ($produit->valeurs as $valeur) {
                if (in_array($valeur->nom, $desiredValues)) {
                    $groupedProducts[$valeur->nom][] = $produit;
                }
            }
        }
    
        // Récupérer les produits Best Sellers
        $bestSellers = Produit::whereHas('valeurs', function ($query) {
            $query->where('nom', 'Best Sellers');
        })->with('valeurs')->get();
        
        // Récupérer les produits de type porte-clé
        $keychains = Produit::where('type', 'porte-clef')->with('valeurs')->get();
        
        // Paginator pour les produits
        $produits = Produit::with(['promotions', 'galleries'])->paginate(9);
        
        // Récupérer toutes les galeries
        $galleries = Gallery::all();
        $produitsEnPromo = Produit::whereHas('promotions')->get();
    // Récupérer les commentaires
    $comments = ProductLikeComment::with('client')->get(); // Assurez-vous que la relation 'client' est définie

        return view('welcome', compact('produits', 'galleries', 'produitsEnPromo', 'keychains', 'groupedProducts', 'bestSellers', 'comments'));
    }

    public function create()
    {
        // Afficher un formulaire de création
        return view('welcome', ['action' => 'create']);
    }

    public function store(Request $request)
    {
        // Enregistrer une nouvelle ressource
        // Logique de stockage ici...
        return redirect()->route('home.index');
    }

    public function show($id)
    {
        // Afficher une ressource spécifique
        return view('welcome', ['action' => 'show', 'id' => $id]);
    }

    public function edit($id)
    {
        // Afficher un formulaire d'édition
        return view('welcome', ['action' => 'edit', 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Mettre à jour une ressource spécifique
        // Logique de mise à jour ici...
        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        // Supprimer une ressource spécifique
        // Logique de suppression ici...
        return redirect()->route('home.index');
    }
}
