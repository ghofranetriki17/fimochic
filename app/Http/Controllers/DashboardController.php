<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandePersonnalisee;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Produit;
use App\Models\Contact;
use App\Models\ClientRessourcePersonnalisation;
use App\Models\RessourcePersonnalisation;

use Carbon\Carbon;

use App\Models\ligneCmd;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all_time');
        $filterName = 'Tout le temps';

        switch ($filter) {
            case 'today':
                $filterName = "Aujourd'hui";
                $totalOrders = Commande::whereDate('created_at', Carbon::today())->count();
                $totalCommandes = CommandePersonnalisee::whereDate('created_at', Carbon::today())->count();
                $totalRevenueCommandes= Commande::whereDate('created_at', Carbon::today())->sum('prix');
                $totalRevenueOrders = CommandePersonnalisee::whereDate('created_at', Carbon::today())->sum('prix_total');
                $totalRevenue = $totalRevenueCommandes + $totalRevenueOrders;
                $pieChartData = [
                    ['value' => $totalRevenueCommandes, 'name' => 'Commandes'],
                    ['value' => $totalRevenueOrders, 'name' => 'Commandes Personnalisées'],
                ];
             
                $femaleClients = Client::whereDate('created_at', Carbon::today())
                ->where('gender', 'female')
                ->count();
               $maleClients = Client::whereDate('created_at', Carbon::today())
              ->where('gender', 'male')
              ->count();
               $otherClients = Client::whereDate('created_at', Carbon::today())
               ->where('gender', 'other')
               ->count();
               $pieChartDataclients = [
                ['value' => $femaleClients, 'name' => 'femmes'],
                ['value' => $maleClients, 'name' => 'hommes'],
                ['value' => $otherClients, 'name' => 'autres'],

            ];
              
            $topProducts = DB::table('ligne_cmds')
            ->select('produit_id', DB::raw('SUM(qtecmnd) as total_quantity'))
            ->whereDate('created_at', Carbon::today())
            ->groupBy('produit_id')
            ->orderBy('total_quantity', 'desc')
            ->limit(3)
            ->get();



                break;
            case 'this_month':
                $filterName = 'Ce mois-ci';
                $totalOrders = Commande::whereMonth('created_at', Carbon::now()->month)
                                       ->whereYear('created_at', Carbon::now()->year)
                                       ->count();
                $totalCommandes = CommandePersonnalisee::whereMonth('created_at', Carbon::now()->month)
                                       ->whereYear('created_at', Carbon::now()->year)
                                       ->count();
                $totalRevenueCommandes= Commande::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('prix');
                $totalRevenueOrders = CommandePersonnalisee::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('prix_total');
                $totalRevenue = $totalRevenueCommandes + $totalRevenueOrders;
                $pieChartData = [
                    ['value' => $totalRevenueCommandes, 'name' => 'Commandes'],
                    ['value' => $totalRevenueOrders, 'name' => 'Commandes Personnalisées'],
                ];
                  // Calcul des clients par genre pour ce mois-ci
                  $femaleClients = Client::whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year)
                  ->where('gender', 'female')
                  ->count();
$maleClients = Client::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->where('gender', 'male')
                ->count();
$otherClients = Client::whereMonth('created_at', Carbon::now()->month)
                 ->whereYear('created_at', Carbon::now()->year)
                 ->where('gender', 'other')
                 ->count();
                 $pieChartDataclients = [
                    ['value' => $femaleClients, 'name' => 'femmes'],
                    ['value' => $maleClients, 'name' => 'hommes'],
                    ['value' => $otherClients, 'name' => 'autres'],
    
                ];




                $topProducts = DB::table('ligne_cmds')
                ->select('produit_id', DB::raw('SUM(qtecmnd) as total_quantity'))
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('produit_id')
                ->orderBy('total_quantity', 'desc')
                ->limit(3)
                ->get();
                break;
            case 'this_year':
                $filterName = 'Cette année';
                $totalOrders = Commande::whereYear('created_at', Carbon::now()->year)->count();
                $totalCommandes = CommandePersonnalisee::whereYear('created_at', Carbon::now()->year)->count();
                $totalRevenueCommandes=Commande::whereYear('created_at', Carbon::now()->year)->sum('prix');
                $totalRevenueOrders = CommandePersonnalisee::whereYear('created_at', Carbon::now()->year)->sum('prix_total');
                $totalRevenue = $totalRevenueCommandes + $totalRevenueOrders;
                $pieChartData = [
                    ['value' => $totalRevenueCommandes, 'name' => 'Commandes'],
                    ['value' => $totalRevenueOrders, 'name' => 'Commandes Personnalisées'],
                ];
                 // Calcul des clients par genre pour cette année
                 $femaleClients = Client::whereYear('created_at', Carbon::now()->year)
                 ->where('gender', 'female')
                 ->count();
$maleClients = Client::whereYear('created_at', Carbon::now()->year)
               ->where('gender', 'male')
               ->count();
$otherClients = Client::whereYear('created_at', Carbon::now()->year)
                ->where('gender', 'other')
                ->count();
                $pieChartDataclients = [
                    ['value' => $femaleClients, 'name' => 'femmes'],
                    ['value' => $maleClients, 'name' => 'hommes'],
                    ['value' => $otherClients, 'name' => 'autres'],
    
                ];




                $topProducts = DB::table('ligne_cmds')
                ->select('produit_id', DB::raw('SUM(qtecmnd) as total_quantity'))
                ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('produit_id')
                ->orderBy('total_quantity', 'desc')
                ->limit(3)
                ->get();
                break;
            case 'all_time':
            default:
                $totalOrders = Commande::count();
                $totalCommandes = CommandePersonnalisee::count();
                $totalRevenueCommandes = Commande::sum('prix');
                $totalRevenueOrders = CommandePersonnalisee::sum('prix_total');
                $totalRevenue = $totalRevenueCommandes + $totalRevenueOrders;
                $pieChartData = [
                    ['value' => $totalRevenueCommandes, 'name' => 'Commandes'],
                    ['value' => $totalRevenueOrders, 'name' => 'Commandes Personnalisées'],
                ];
                  // Calcul des clients par genre pour tout le temps
                  $femaleClients = Client::where('gender', 'female')->count();
                  $maleClients = Client::where('gender', 'male')->count();
                  $otherClients = Client::where('gender', 'other')->count();
                  $pieChartDataclients = [
                    ['value' => $femaleClients, 'name' => 'femmes'],
                    ['value' => $maleClients, 'name' => 'hommes'],
                    ['value' => $otherClients, 'name' => 'autres'],
    
                ];





                $topProducts = DB::table('ligne_cmds')
                ->select('produit_id', DB::raw('SUM(qtecmnd) as total_quantity'))
                ->groupBy('produit_id')
                ->orderBy('total_quantity', 'desc')
                ->limit(3)
                ->get();
                  break;
        }

        // Calcul du pourcentage d'augmentation (exemple simplifié)
        $previousPeriodOrders = Commande::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()->subDays(1)])->count();
        $orderIncreasePercentage = $previousPeriodOrders > 0 ? (($totalOrders - $previousPeriodOrders) / $previousPeriodOrders) * 100 : 0;
        $previousPeriodCommandes = CommandePersonnalisee::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()->subDays(1)])->count();
        $commandeIncreasePercentage = $previousPeriodCommandes > 0 ? (($totalCommandes - $previousPeriodCommandes) / $previousPeriodCommandes) * 100 : 0;




          // Revenue Calculations

          
          

        
       // Pie Chart Data
 
       $topLikedProducts = Produit::withCount(['likes' => function($query) {
        $query->where('like', true);
    }])->orderBy('likes_count', 'desc')->take(6)->get();
  




    $orderStates = Commande::select('etat', DB::raw('count(*) as total'))
        ->groupBy('etat')
        ->pluck('total', 'etat')
        ->toArray();

    // Préparer les données pour le graphique
    $states = [
        '0' => 'En attente',
        '1' => 'Confirmée',
        '2' => 'En stock/en fabrication',
        '3' => 'En route',
        '4' => 'Livrée'
    ];
    
    $orderStateData = [];
    foreach ($states as $stateId => $stateName) {
        $orderStateData[] = [
            'name' => $stateName,
            'value' => isset($orderStates[$stateId]) ? $orderStates[$stateId] : 0,
        ];
    }

    // Définir les étiquettes pour le graphique à barres
    $barChartLabels = array_values($states);
    $barChartData = array_column($orderStateData, 'value');

    $recentMessages = Contact::where('is_read', false)
    ->orderBy('created_at', 'desc')
    ->take(10)  // Modifier ce nombre selon vos besoins
    ->get();
    $lignesCommande = ligneCmd::with('produit') // Assurez-vous d'avoir la relation 'produit' définie dans votre modèle ligneCmd
    ->orderBy('created_at', 'desc')
    ->take(10) // Limiter le nombre de résultats si nécessaire
    ->get();













    $personnalisations = ClientRessourcePersonnalisation::all();

    // Grouper les personnalisations par date de création (sans tenir compte de l'heure)
    $groupedByDateTime = $personnalisations->groupBy(function ($item) {
        return $item->created_at->format('Y-m-d H:i:s'); // Utilisation de la date et de l'heure
    });

    // Compter le nombre de groupes distincts
    $groupCount = $groupedByDateTime->count();













 // Grouper les personnalisations par type
 $groupedByType = $personnalisations->groupBy(function ($item) {
    return $item->ressourcePersonnalisation->type;
});

$mostUsedPerType = [];

foreach ($groupedByType as $type => $items) {
    $mostUsedItem = $items->groupBy('ressource_personnalisation_id')->map(function ($group) {
        return $group->count();
    })->sortDesc()->first();

    // Trouver la ressource la plus utilisée
    $mostUsedResource = RessourcePersonnalisation::find($items->first()->ressource_personnalisation_id);
    
    $mostUsedPerType[$type] = [
        'nom' => $mostUsedResource ? $mostUsedResource->nom : 'Inconnu',
        'type' => $type,
        'count' => $mostUsedItem,
    ];
}










$startOfYear = Carbon::now()->startOfYear();
$endOfYear = Carbon::now()->endOfYear();

// Revenu total par mois
$totalRevenueByMonth = Commande::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(prix) as revenue'))
    ->whereBetween('created_at', [$startOfYear, $endOfYear])
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy('month')
    ->pluck('revenue', 'month');

$customOrderRevenueByMonth = CommandePersonnalisee::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(prix_total) as revenue'))
    ->whereBetween('created_at', [$startOfYear, $endOfYear])
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy('month')
    ->pluck('revenue', 'month');

// Revenu total par mois pour le graphique
$months = range(1, 12); // Mois de 1 à 12
$totalRevenuee = array_fill_keys($months, 0);
$customOrderRevenue = array_fill_keys($months, 0);

foreach ($totalRevenueByMonth as $month => $revenue) {
    $totalRevenuee[$month] = $revenue;
}

foreach ($customOrderRevenueByMonth as $month => $revenue) {
    $customOrderRevenue[$month] = $revenue;
}

// Convertir les données pour le graphique
$lineChartData = [
    [
        'name' => 'Revenu Total',
        'data' => array_values($totalRevenuee)
    ],
    [
        'name' => 'Revenu Commandes Personnalisées',
        'data' => array_values($customOrderRevenue)
    ]
];









        return view('dashboard', compact('orderIncreasePercentage',
            'commandeIncreasePercentage',
            'orderStateData','recentMessages','topLikedProducts','totalOrders', 'topProducts','filterName', 'orderIncreasePercentage','totalCommandes', 'commandeIncreasePercentage' , 
       
       
   
        'totalRevenue','lineChartData','lignesCommande','barChartData','groupCount','groupedByDateTime', 'barChartLabels' ,'pieChartDataclients','totalRevenueOrders','totalRevenueCommandes','pieChartData', 'femaleClients', 'maleClients', 'otherClients',
        'mostUsedPerType'
       ));
    }




}
