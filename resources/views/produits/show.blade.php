<!-- resources/views/produits/show.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')



<div class="container">
    <h1>{{ $produit->nom }}</h1>
    <p>{{ $produit->prix }} DT</p>
    <p>Quantité disponible : {{ $produit->qte_dispo }}</p>
    <p>Type : {{ $produit->type }}</p>
    <p>Date d'ajout : {{ $produit->date_ajout }}</p>
    <p>Description : {{ $produit->description }}</p>
    <p>Valeurs :</p>
    <ul>
        @foreach ($produit->valeurs as $valeur)
            <li>{{ $valeur->nom }}</li>
        @endforeach
    </ul>
</div>

@include('dashboard.layout.footer')
