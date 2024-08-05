@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>
.table-responsive{
    margin-top: 150px;}
    .cart-item {
    display: flex;
    align-items: center;
}
.btn{margin-top: 20px;}

.quantity-display {
    margin-top: 25px;
    display: inline-block;
    width: 40px;
    text-align: center;
}

    </style>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Affichage des messages de succès -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       <!-- Tableau des articles du panier -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Produits</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Total</th>
                <th scope="col">Gérer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cart as $item)
                <tr>
                    <th scope="row">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('img/' . $item->produit->image) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                        </div>
                    </th>
                    <td>
                        <p class="mb-0 mt-4">{{ $item->produit->name }}</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">{{ $item->getPrix() }}dt</p>
                    </td>
                    <td>
                        <!-- Formulaires pour mettre à jour les quantités -->
                        <div class="cart-item d-flex align-items-center mb-3">
                            <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline me-2">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="increment">
                                <button type="submit" class="btn btn-sm btn-outline-primary">+</button>
                            </form>
                            <span class="quantity-display me-2">{{ $item->quantite }}</span>
                            <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="decrement">
                                <button type="submit" class="btn btn-sm btn-outline-danger">-</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">{{ $item->quantite * $item->getPrix() }}dt</p>
                    </td>
                    <td>
                        <form action="{{ route('panier.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Votre panier est vide.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        <!-- Bouton pour afficher le récapitulatif -->
        <button type="button" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" data-bs-toggle="modal" data-bs-target="#orderSummaryModal">
            Voir le Récapitulatif
        </button>

        <!-- Modale pour le récapitulatif -->
        <div class="modal fade" id="orderSummaryModal" tabindex="-1" aria-labelledby="orderSummaryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderSummaryModalLabel">Récapitulatif de la Commande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="display-6 mb-4">Total <span class="fw-normal">du Panier</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Sous-total:</h5>
                            <p class="mb-0">{{ $total }}dt</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Livraison</h5>
                            <div>
                                <p class="mb-0">Forfait: 7.00dt</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Livraison en Ukraine.</p>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">{{ $total + 7.00 }}dt</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('commandes.store') }}" method="POST" class="w-100">
                            @csrf
                            <div class="mb-3">
                                <label for="address" class="form-label">Adresse de Livraison</label>
                                <input type="text" class="form-control" id="address" name="adresse" placeholder="Adresse de livraison" required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Méthode de Paiement</label>
                                <select class="form-select" id="payment_method" name="payment_method" required>
                                    <option value="cash_on_delivery">Paiement à la livraison</option>
                                    <option value="post">Chèque Postal</option>
                                    <option value="visa">Carte Visa</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Code Promo">
                                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Appliquer le Code</button>
                            </div>
                            <input type="hidden" name="total_price" value="{{ $total + 7.00 }}">
                            <button type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase">Procéder au Paiement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
   <!-- Affichage des personnalisations -->
   <h2>Personnalisations</h2>
@if(isset($personnalisations) && $personnalisations->isEmpty())
    <p>Aucune personnalisation trouvée.</p>
@else
    @foreach($personnalisations as $date => $items)
        <h3>Commande de: {{ $date }}</h3>
        <form action="{{ route('clientRessourcePersonnalisations.deleteAllByDate', ['date' => $date]) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Supprimer toutes les personnalisations de cette date</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Type de Ressource</th>
                    <th>Image</th>
                    <th>Quantité</th>
                    <th>Prix Total</th>
                    <th>Date de Création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->ressourcePersonnalisation->nom }}</td>
                        <td>
                            @if($item->ressourcePersonnalisation->image)
                                <img src="{{ asset('img/' . $item->ressourcePersonnalisation->image) }}" alt="{{ $item->ressourcePersonnalisation->nom }}" width="50">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        <td>
                            <!-- Formulaire pour mettre à jour la quantité -->
                            <form action="{{ route('clientRessourcePersonnalisations.updateQuantity', ['clientRessourcePersonnalisation' => $item->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantite" value="{{ $item->quantite }}" min="1" class="form-control d-inline w-auto">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>
                        </td>
                        <td>{{ $item->prix_total }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <!-- Formulaire pour supprimer une ligne spécifique -->
                            <form action="{{ route('clientRessourcePersonnalisations.destroy', ['clientRessourcePersonnalisation' => $item->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endif

@include('welcome.layout.footer')
