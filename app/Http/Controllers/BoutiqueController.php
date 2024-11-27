<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Gallery;
use App\Models\Attribut;
use App\Models\Promotion; // Assurez-vous que ce modèle existe
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ProductLikeComment; // Ajouter cette ligne

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer tous les attributs avec leurs valeurs
        $attributs = Attribut::with('valeurs')->get();
        
        // Récupérer les prix minimum et maximum des produits
        $minPrice = Produit::min('prix');
        $maxPrice = Produit::max('prix');
        
        // Construire la requête de filtrage
        $produits = Produit::query();
        
        // Appliquer les filtres en fonction des attributs et valeurs
        if ($request->has('valeur_id') && $request->valeur_id != '') {
            $produits->whereHas('valeurs', function ($query) use ($request) {
                $query->where('valeurs.id', $request->valeur_id);
            });
        }
    
        // Appliquer le filtre de prix
        if ($request->has('price_min') && $request->has('price_max')) {
            $priceMin = (int) $request->input('price_min');
            $priceMax = (int) $request->input('price_max');
            $produits->whereBetween('prix', [$priceMin, $priceMax]);
        }
    
        // Filtrer par type si un type est sélectionné
        if ($request->has('type') && $request->input('type') !== '') {
            $type = $request->input('type');
            $produits->where('type', $type);
        }
    
        // Ajouter le filtrage par terme de recherche
        if ($request->has('search') && $request->input('search') !== '') {
            $searchTerm = $request->input('search');
            $produits->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%")
                      ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        
        // Appliquer le tri
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $produits->orderBy('prix', 'asc');
                    break;
                case 'price_desc':
                    $produits->orderBy('prix', 'desc');
                    break;
                case 'name_asc':
                    $produits->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $produits->orderBy('name', 'desc');
                    break;
                default:
                    // Pas de tri par défaut
                    break;
            }
        }
        
        // Récupérer les produits filtrés et triés
        $produits = $produits->with(['promotions', 'galleries', 'comments'])->paginate(12);
        
        // Récupérer toutes les galeries
        $galleries = Gallery::all();
        
        // Récupérer les produits les mieux notés (Best Sellers)
        $bestSellers = Produit::whereHas('valeurs', function ($query) {
            $query->where('nom', 'Best Sellers');
        })->with('valeurs')->get();
        
        // Déterminer les produits ajoutés dans les 15 derniers jours
        $date15Jours = Carbon::now()->subDays(30);
        $nouveauxProduits = Produit::where('date_ajout', '>=', $date15Jours)->get();
        
        // Récupérer les produits en promotion
        $produitsEnPromo = Produit::whereHas('promotions')->get();
        
        // Récupérer tous les types de produits
        $types = Produit::distinct()->pluck('type');
        
        return view('boutique.index', compact('produits', 'galleries', 'produitsEnPromo', 'attributs', 'bestSellers', 'minPrice', 'maxPrice', 'nouveauxProduits', 'types'));
    }
}

