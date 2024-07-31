@include('welcome.layout.head')
@include('welcome.layout.nav')

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Affichage des messages de succès -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Le reste de votre vue pour afficher les articles du panier -->

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
                                <!-- For updating quantities -->
                                <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="increment">
                                    <input type="number" name="quantity" value="{{ $item->quantite }}" min="1">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
                                </form>

                                <form action="{{ route('panier.update', ['panier' => $item->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="decrement">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">{{ $item->quantite * $item->produit->prix }}dt</p>
                            </td>
                            <td>
                                <!-- For removing items -->
                                <form action="{{ route('panier.destroy', ['panier' => $item->id]) }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center">Your cart is empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">{{ $total }}dt</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: 7.00dt</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Shipping to Ukraine.</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">{{ $total + 7.00 }}dt</p>
                    </div>
                    <form action="{{ route('commandes.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart Page End -->

@include('welcome.layout.footer')
