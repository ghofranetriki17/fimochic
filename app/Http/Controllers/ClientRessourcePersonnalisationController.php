<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RessourcePersonnalisation;
use App\Models\Panier;

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
        // Assurez-vous que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour personnaliser.');
        }

        // Récupérer les ressources de personnalisation regroupées par type pour les cadeaux
        $ressourcesParType = RessourcePersonnalisation::where('cat', 'cadeau')->get()->groupBy('type');

        // Obtenir l'identifiant du client connecté
        $clientId = Auth::user()->client->id;

        // Récupérer les produits du panier pour le client connecté
        $cart = Panier::where('client_id', $clientId)
        ->with(['produit.galleries' => function($query) {
            $query->where('type', 'sans');
        }])
        ->get();
        return view('personnalisation.indexCadeau', compact('ressourcesParType', 'cart'));
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
    
    public function indexDashboard()
    {
        $personnalisations = ClientRessourcePersonnalisation::with(['client', 'ressourcePersonnalisation'])
            ->orderBy('created_at')
            ->get()
            ->groupBy(['client_id', function ($item) {
                return $item->created_at->format('Y-m-d H:i:s'); // Grouping by exact timestamp
            }]);
            
        return view('personnalisation.index', compact('personnalisations'));
    }
    
    
    
    public function updateQuantity(Request $request, $id)
    {
        $clientRessourcePersonnalisation = ClientRessourcePersonnalisation::findOrFail($id);
        $quantite = $request->input('quantite');
        $clientRessourcePersonnalisation->quantite = $quantite;
        $clientRessourcePersonnalisation->prix_total = $clientRessourcePersonnalisation->ressourcePersonnalisation->prix * $quantite;
        $clientRessourcePersonnalisation->save();
    
        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');
    }
    public function deleteAllByDate(Request $request, $date)
    {
        // Assurez-vous que la date est au format Y-m-d
        $date = date('Y-m-d', strtotime($date));
    
        // Supprimer toutes les personnalisations où created_at est à la date spécifiée
        ClientRessourcePersonnalisation::whereDate('created_at', $date)->delete();
    
        return redirect()->back()->with('success', 'Toutes les personnalisations de cette date ont été supprimées.');
    }
    
    public function show()
    {
        $clientId = Auth::user()->client->id;
        $personnalisations = ClientRessourcePersonnalisation::where('client_id', $clientId)->get();
        return view('personnalisation.show', compact('personnalisations'));
    }
    public function destroy($id)
{
    $clientRessourcePersonnalisation = ClientRessourcePersonnalisation::findOrFail($id);
    $clientRessourcePersonnalisation->delete();

    return redirect()->back()->with('success', 'Personnalisation supprimée avec succès.');
}

}
