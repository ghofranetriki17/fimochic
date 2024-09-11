<!-- resources/views/produits/index.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<style>
    .product-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        padding: 15px;
        text-align: center;
        /* Limite la largeur maximale des cartes */
        max-width: 300px;
        /* Ajoute une largeur fluide avec un espacement automatique */
        margin: 0 auto;
    }

    .product-image {
        height: 150px; /* Hauteur réduite pour les images des produits */
        object-fit: cover; /* Assure que les images couvrent la zone */
        width: 100%; /* S'assure que les images occupent toute la largeur disponible */
        border-radius: 8px;
    }

   
    .image-placeholder {
        background-color: #f0f0f0;
        height: 150px; /* Hauteur fixe pour les images non disponibles */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .out-of-stock {
        background-color: #f8d7da;
        color: #721c24;
    }

    .description-hidden {
        display: none; /* Cache la description au départ */
    }

    .description {
        height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="container">
    
 
    @if($products->isEmpty())
        <p>Aucun produit trouvé.</p>
    @else
            @foreach($products as $product)
                <div class="@if ($product->qte_dispo < 3)  @endif">
                    <div class="product-card">
                        <h3>{{ $product->nom }}</h3>
                        @if ($product->image)
                            <img src="{{ asset('img/' . $product->image) }}" class="product-image" alt="Image du produit">
                        @else
                            <div class="image-placeholder">Image non disponible</div>
                        @endif
                        <p>Prix: {{ $product->prix }} DT</p>
                        <p class="description">{{ $product->description }}</p>
                        <!-- Boutons pour les actions -->
                        <div class="button-group mt-2">
                            <a href="{{ route('produits.show', $product->id) }}" class="btn btn-info">Afficher</a>
                            <a href="{{ route('produits.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('produits.destroy', $product->id) }}"
                               onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }"
                               class="btn btn-danger">Supprimer</a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('produits.destroy', $product->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('dashboard.layout.footer')
