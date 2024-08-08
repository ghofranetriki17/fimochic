@include('welcome.layout.head')
@include('welcome.layout.nav')

<div class="container mt-4">
    <h1>Vos Créations</h1>
    <div class="row g-4 justify-content-center">
        @foreach ($commandes as $commande)
            <div class="col-md-6 col-lg-4">
                <div class="product-card">
                    <div class="card-body">
                        <div class="product-image-container">
                            @if ($commande->image_perso)
                                <img src="{{ asset('img/' . $commande->image_perso) }}" alt="Image Personnalisée" class="product-image main-image img-fluid">
                            @endif
                            @if ($commande->image_reelle)
                                <img src="{{ asset('img/' . $commande->image_reelle) }}" alt="Image Réelle" class="product-image hover-image img-fluid">
                            @endif
                        </div>
                        <h4>{{ $commande->client->nom }} {{ $commande->client->preNom }}</h4>
                        <p><strong>Date:</strong> {{ $commande->commande_date }}</p>
                        <p><strong>Prix Total:</strong> {{ $commande->prix_total }} DT</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Liens de pagination -->
    <div class="pagination-links">
        {{ $commandes->links() }}
    </div>
</div>

<style>
.product-card {
    border: 1px solid #ddd;
    width: 300px;

    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 50px;
    height: 350px;
    position: relative;
    transition: transform 0.3s ease, background-color 0.3s ease;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.mt-4 {
    margin-top: 10rem !important;
}
.product-image-container {
    position: relative;
    height: 200px; /* Ajustez la hauteur selon vos besoins */
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    transition: opacity 0.3s ease;
}

.main-image {
    opacity: 1;
}

.hover-image {
    opacity: 0;
}

.product-card:hover .hover-image {
    opacity: 1;
}

.product-card:hover .main-image {
    opacity: 0;
}

.card-body {
    padding: 15px;
    text-align: center;
    background-color: #fff;
}

.card-body h4 {
    margin: 10px 0;
    font-size: 1.2em;
    color: #ffb3c1;
}

.card-body p {
    margin: auto;
    font-size: 1.2em;
    color: #46bbd5 !important;
}

.btn-primary {
    background-color: #d63384;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    color: white;
    font-weight: 600;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: white !important;
    color: #d63384;
}

/* Pagination Styles */
.pagination-links {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-item {
    margin: 0 5px;
}

.pagination .page-link {
    color: #ff69b4;
    background-color: #ffe4e1;
    border: 1px solid #ffb6c1;
    padding: 8px 12px;
    border-radius: 50%;
    transition: background-color 0.3s, color 0.3s;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.pagination .page-link:hover {
    color: #ffffff;
    background-color: #ff69b4;
    border-color: #ff69b4;
}

.pagination .page-item.active .page-link {
    z-index: 1;
    color: #ffffff;
    background-color: #ff1493;
    border-color: #ff1493;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.pagination .page-item.disabled .page-link {
    color: #ffc0cb;
    background-color: #fff0f5;
    border-color: #ffc0cb;
}
</style>

@include('welcome.layout.footer')
