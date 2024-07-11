
@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')


<div class="container">
        <h1>Liste des Produits</h1>

        <div class="row">
            @foreach ($produits as $produit)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                       <!-- @if ($produit->images->count() > 0)
                            <img class="card-img-top" src="{{ asset('storage/' . $produit->images->first()->chemin) }}" alt="Image du produit">
                        @else
                            <img class="card-img-top" src="{{ asset('images/default.jpg') }}" alt="Image par défaut">
                        @endif-->
                        <div class="card-body">
                            <h2>{{ $produit->nom }}</h2>
                            <p>{{ $produit->prix }} DT</p>
                            <p>Quantité disponible : {{ $produit->qte_dispo }}</p>
                            <p>Type : {{ $produit->type }}</p>
                            <p>Date d'ajout : {{ $produit->date_ajout }}</p>
                            <p>Description : {{ $produit->description }}</p>
                            <!-- Ajoutez d'autres attributs selon vos besoins -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@include('dashboard.layout.footer')
