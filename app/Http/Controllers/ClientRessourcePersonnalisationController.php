<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RessourcePersonnalisation;
use App\Models\ClientRessourcePersonnalisation;

class ClientRessourcePersonnalisationController extends Controller
{
    public function index()
    {
        // Récupérer les ressources de personnalisation regroupées par type
        $ressourcesParType = RessourcePersonnalisation::where('cat', 'boucles')->get()->groupBy('type');
        return view('personnalisation.index', compact('ressourcesParType'));
    }

    public function store(Request $request)
    {
        // Validation des données JSON
        $request->validate([
            'ressources_json' => 'required|json',
        ]);
    
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
    
        return redirect()->route('personnalisation.index')->with('success', 'Personnalisation enregistrée avec succès');
    }
    
    
    
    
    
    public function show()
    {
        $clientId = Auth::user()->client->id;
        $personnalisations = ClientRessourcePersonnalisation::where('client_id', $clientId)->get();
        return view('personnalisation.show', compact('personnalisations'));
    }
}
