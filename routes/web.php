<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitValeurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\RessourcePersonnalisationController;

use App\Http\Controllers\ValeurController;
use App\Http\Controllers\AttributController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\PromotionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoutiqueController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HomeController;

Route::resource('home', HomeController::class);

// Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resources([
    'clients' => ClientController::class,
]);Route::resources([
    'produits' => ProduitController::class,
]);
Route::get('/index', [ProduitController::class, 'index'])->name('produits.index');

Route::resources([
    'valeurs' => ValeurController::class,
]);
Route::resources([
    'produitvaleur' => ProduitValeurController::class,
])
;
Route::resource('attributs', AttributController::class);
Route::get('/valeurs/{valeur}/edit', [ValeurController::class, 'edit'])->name('valeurs.edit');
Route::resource('ressources', RessourceController::class);
Route::resource('galleries', GalleryController::class);
Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique.index');
Route::resource('boutique', BoutiqueController::class);


// routes/web.php



// Route resource pour le PanierController
Route::resource('panier', PanierController::class);
Route::resource('promotions', PromotionController::class);
Route::middleware('auth')->group(function () {
    Route::get('/compte', [ClientController::class, 'compte'])->name('clients.compte');
});
Route::resource('commandes', CommandeController::class);

// Routes pour les commandes
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show'); // Pour les détails de la commande (admin)
Route::get('/commandes/details/{id}', [CommandeController::class, 'details'])->name('commandes.details'); // Pour les détails de la commande (client)

// routes/web.php


Route::resource('ressources_personnalisation', RessourcePersonnalisationController::class);
use App\Http\Controllers\ClientRessourcePersonnalisationController;


// Routes personnalisées
Route::get('/personnalisation/boucles', [ClientRessourcePersonnalisationController::class, 'indexBoucles'])->name('personnalisation.boucles');
Route::get('/personnalisation/cadeau', [ClientRessourcePersonnalisationController::class, 'indexCadeau'])->name('personnalisation.cadeau');

Route::post('/store-personnalisation', [ClientRessourcePersonnalisationController::class, 'store'])->name('personnalisation.store');
use App\Http\Controllers\AboutController;

Route::get('/apropos', [AboutController::class, 'index'])->name('apropos');
Route::get('/personnalisation', [ClientRessourcePersonnalisationController::class, 'indexDashboard'])->name('personnalisation.index');
Route::patch('/clientRessourcePersonnalisations/{clientRessourcePersonnalisation}', [ClientRessourcePersonnalisationController::class, 'updateQuantity'])->name('clientRessourcePersonnalisations.updateQuantity');
Route::post('/clientRessourcePersonnalisations/deleteAllByDate/{date}', [ClientRessourcePersonnalisationController::class, 'deleteAllByDate'])->name('clientRessourcePersonnalisations.deleteAllByDate');
Route::delete('/clientRessourcePersonnalisations/{clientRessourcePersonnalisation}', [ClientRessourcePersonnalisationController::class, 'destroy'])->name('clientRessourcePersonnalisations.destroy');
