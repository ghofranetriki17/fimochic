<!-- resources/views/produits/index.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')



<div class="container">
    <h1>Liste des Produits</h1>
    
    <!-- Bouton pour accéder à la page de création d'un nouveau produit -->
    <div class="mb-4">
        <a href="{{ route('produits.create') }}" class="btn btn-info">Ajouter un Nouveau Produit</a>
    </div>

    @foreach ($produitsParType as $type => $produits)
        <div class="section">
            <h2>{{ $type }}</h2>
            <div class="row">
                @foreach ($produits as $produit)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm @if ($produit->qte_dispo < 3) bg-danger text-white @endif">
                         
                            <div class="card-body">
                                <h3>{{ $produit->name }}</h3>
                                @if ($produit->image)
                                <img src="{{ asset('img/' . $produit->image) }}" class="card-img-top" alt="Image du produit">
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
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@include('dashboard.layout.footer')
