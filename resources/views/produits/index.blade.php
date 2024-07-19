<!-- resources/views/produits/index.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<style>
    
    .gallery-image {
        height: 430px; /* Hauteur fixe pour les images de galerie */
        object-fit: cover; /* Assure que les images couvrent la zone */
        /* Styles personnalisés supplémentaires selon les besoins */
    }

    .same-line-container {
        display: flex;
        flex-wrap: nowrap; /* Empêche le retour à la ligne */
        justify-content: space-between; /* Répartit les éléments sur la ligne */
        align-items: center; /* Centre verticalement les éléments */
        margin-bottom: 20px; /* Espacement en bas du conteneur */
    }

    .same-line-item {
        /* Styles supplémentaires au besoin */
        /* Exemple : margin-right: 10px; pour ajouter un espacement entre les éléments */
    }
</style>

<div class="container">
    <h1>Liste des Produits</h1>
    
    <!-- Bouton pour accéder à la page de création d'un nouveau produit -->
    <div class="mb-4">
        <a href="{{ route('produits.create') }}" class="btn btn-info">Ajouter un Nouveau Produit</a>
    </div>

    @foreach ($produitsParType as $type => $produits)
        <div class="section">
            <h2>{{ $type }}</h2>
            @foreach ($produits as $produit)
            <div class="same-line-container" style="background-color:  rgb(255, 230, 240); padding: 20px; margin-bottom: 20px;">
    <div class="same-line-item">
        @php
            $galleryL = null;
            $galleryR = null;
        @endphp
        @foreach ($galleries as $gallery)
            @if ($gallery->produit_id === $produit->id)
                @if ($gallery->type === 'L')
                    @php $galleryL = $gallery; @endphp
                @elseif ($gallery->type === 'R')
                    @php $galleryR = $gallery; @endphp
                @endif
            @endif
        @endforeach

        @if ($galleryL)
            <img src="{{ asset('img/' . $galleryL->image) }}" class="img-fluid gallery-image" alt="Image L">
        @endif
    </div>
    <div class="same-line-item">
        <div class="card mb-4 shadow-sm @if ($produit->qte_dispo < 3) bg-danger text-white @endif" style="background-color: white;">
            <div class="card-body">
                <h3>{{ $produit->name }}</h3>
                @if ($produit->image)
                    <img src="{{ asset('img/' . $produit->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Image du produit">
                @else
                    <div class="image-placeholder">Image non disponible</div>
                @endif
                <p>Prix: {{ $produit->prix }} DT</p>
                <p>Quantité disponible : {{ $produit->qte_dispo }}</p>
                <!-- Description with title attribute -->
                <div class="description-hidden">
                    <p class="description">{{ $produit->description }}</p>
                </div>                                
                <!-- Boutons pour les actions -->
                <div class="button-group mt-auto">
                    <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info">Afficher</a>
                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning">Modifier</a>
                    <!-- Lien pour la suppression -->
                    <a href="{{ route('produits.destroy', $produit->id) }}"
                       onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) { document.getElementById('delete-form-{{ $produit->id }}').submit(); }"
                       class="btn btn-danger">Supprimer</a>
                    <form id="delete-form-{{ $produit->id }}" action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="same-line-item">
        @if ($galleryR)
            <img src="{{ asset('img/' . $galleryR->image) }}" class="img-fluid gallery-image" alt="Image R">
        @endif
    </div>
</div>

            @endforeach
        </div>
    @endforeach
</div>

@include('dashboard.layout.footer')
