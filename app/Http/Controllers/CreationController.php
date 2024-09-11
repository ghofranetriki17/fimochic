<?php

namespace App\Http\Controllers;

use App\Models\CommandePersonnalisee;
use Illuminate\Http\Request;

class CreationController extends Controller
{
    public function index()
    { // Récupérer les commandes personnalisées avec les clients associés
        $commandes = CommandePersonnalisee::with('client')
            ->orderBy('created_at', 'desc') // Tri par date de création décroissante
            ->paginate(15); // Nombre d'éléments par page
             return view('creations.index', compact('commandes'));
    }

    public function show(CommandePersonnalisee $commande)
    {
        return view('creations.show', compact('commande'));
    }
}
