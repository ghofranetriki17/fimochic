<!-- resources/views/produits/index.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="container">
    <h1>Liste des Produits</h1>

    @foreach ($produitsParType as $type => $produits)
        <div class="section">
            <h2>{{ $type }}</h2>
            <div class="row">
                @foreach ($produits as $produit)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if ($produit->image)
                                <img src="{{ asset('storage/' . $produit->image) }}" class="card-img-top" alt="Image du produit">
                            @else
                                <div class="image-placeholder">Image non disponible</div>
                            @endif
                            <div class="card-body">
                                <h3>{{ $produit->name }}</h3>
                                <p>{{ $produit->prix }} DT</p>
                                <p>Quantité disponible : {{ $produit->qte_dispo }}</p>
                                <p>Date d'ajout : {{ $produit->date_ajout }}</p>
                                <p>Description : {{ $produit->description }}</p>
                                <!-- Affichage des valeurs associées -->
                                <p>Valeurs :</p>
                                <ul>
                                    @foreach ($produit->valeurs as $valeur)
                                        <li>{{ $valeur->nom }}</li>
                                    @endforeach
                                </ul>

                                <!-- Boutons pour les actions -->
                                <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning">Modifier</a>
                                
                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    
</div>

@include('dashboard.layout.footer')
