<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandePersonnalisee;
use App\Models\Client;


use Carbon\Carbon;

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
                  break;
        }

        // Calcul du pourcentage d'augmentation (exemple simplifié)
        $previousPeriodOrders = Commande::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()->subDays(1)])->count();
        $orderIncreasePercentage = $previousPeriodOrders > 0 ? (($totalOrders - $previousPeriodOrders) / $previousPeriodOrders) * 100 : 0;
        $previousPeriodCommandes = CommandePersonnalisee::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()->subDays(1)])->count();
        $commandeIncreasePercentage = $previousPeriodCommandes > 0 ? (($totalCommandes - $previousPeriodCommandes) / $previousPeriodCommandes) * 100 : 0;




          // Revenue Calculations

          
          

        
       // Pie Chart Data
 
     
  
        return view('dashboard', compact('totalOrders', 'filterName', 'orderIncreasePercentage','totalCommandes', 'commandeIncreasePercentage' , 
       
       
   
        'totalRevenue','pieChartDataclients','totalRevenueOrders','totalRevenueCommandes','pieChartData', 'femaleClients', 'maleClients', 'otherClients'
       ));
    }

}
