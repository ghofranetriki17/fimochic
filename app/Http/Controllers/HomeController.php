<?php

namespace App\Http\Controllers;
use App\Models\Produit;

use Illuminate\Http\Request;

class HomeController extends Controller
{public function index()
    {
        $desiredValues = ['Été', 'Tendance/Mode', 'Quotidien', 'Travail/Professionnel'];
    
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
        $keychains = Produit::where('type', 'porte-clef')->with('valeurs')->get();

        return view('welcome', compact('keychains','groupedProducts', 'bestSellers'));
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
