<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RessourcePersonnalisation;
use App\Models\ClientRessourcePersonnalisation;

class ClientRessourcePersonnalisationController extends Controller
{  
    public function indexBoucles()
    {
        // Récupérer les ressources de personnalisation regroupées par type pour les boucles
        $ressourcesParType = RessourcePersonnalisation::where('cat', 'boucles')->get()->groupBy('type');
        return view('personnalisation.indexBoucles', compact('ressourcesParType'));
    }
    public function indexCadeau()
    {
        // Récupérer les ressources de personnalisation regroupées par type pour les cadeaux
        $ressourcesParType = RessourcePersonnalisation::where('cat', 'cadeau')->get()->groupBy('type');
        return view('personnalisation.indexCadeau', compact('ressourcesParType'));
    }

    public function store(Request $request)
    {
        // Validation des données JSON
        $request->validate([
            'ressources_json' => 'required|json',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour personnaliser.');
        }

        $clientId = Auth::user()->client->id;
        $ressourcesData = json_decode($request->input('ressources_json'), true);

        foreach ($ressourcesData as $data) {
            ClientRessourcePersonnalisation::create([
                'client_id' => $clientId,
                'ressource_personnalisation_id' => $data['id'],
                'quantite' => $data['quantity'],
                'prix_total' => $data['quantity'] * RessourcePersonnalisation::find($data['id'])->prix,
            ]);
        }

        return redirect()->route('boutique.index')->with('success', 'Personnalisation enregistrée avec succès');
    }
    
    
    
    
    public function show()
    {
        $clientId = Auth::user()->client->id;
        $personnalisations = ClientRessourcePersonnalisation::where('client_id', $clientId)->get();
        return view('personnalisation.show', compact('personnalisations'));
    }
}
