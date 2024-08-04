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
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
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
                                <p class="mb-0 mt-4">{{ $item->produit->prix }}dt</p>
                            </td>
                            <td>
                                <!-- Formulaires pour mettre à jour les quantités -->
    <div class="cart-item d-flex align-items-center mb-3">
        <!-- Formulaire pour incrémenter la quantité -->
        <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline me-2">
            @csrf
            @method('PATCH')
            <input type="hidden" name="action" value="increment">
            <button type="submit" class="btn btn-sm btn-outline-primary">+</button>
        </form>
        <!-- Affichage de la quantité -->
        <span class="quantity-display me-2">{{ $item->quantite }}</span>
        <!-- Formulaire pour décrémenter la quantité -->
        <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="action" value="decrement">
            <button type="submit" class="btn btn-sm btn-outline-danger">-</button>
        </form>
    </div>


                            </td>
                            <td>
                                <p class="mb-0 mt-4">{{ $item->quantite * $item->produit->prix }}dt</p>
                            </td>
                            <td>
                                <!-- Formulaire pour retirer les articles -->
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

@include('welcome.layout.footer')
