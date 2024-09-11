<!-- resources/views/produits/show.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container mt-5">
    <h1>{{ $produit->nom }}</h1>
    <p><strong>ID :</strong> {{ $produit->id }}</p>
    <p><strong>Prix :</strong> {{ $produit->prix }} DT</p>
    <p><strong>Quantité disponible :</strong> {{ $produit->qte_dispo }}</p>
    <p><strong>Type :</strong> {{ $produit->type }}</p>
    <p><strong>Date d'ajout :</strong> {{ $produit->date_ajout }}</p>
    <p><strong>Description :</strong> {{ $produit->description }}</p>
    <p><strong>Valeurs :</strong></p>
    <ul>
        @foreach ($produit->valeurs as $valeur)
            <li>{{ $valeur->nom }}</li>
        @endforeach
    </ul>
    @if ($produit->image)
        <div class="mt-4">
            <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->nom }}" class="img-fluid" style="max-width: 200px;">
        </div>
    @else
        <p class="mt-4">Aucune image disponible pour ce produit.</p>
    @endif

    <!-- Affichage des images de type "R" et "L" -->
    @foreach ($galleries as $gallery)
        @if ($gallery->type === 'R' || $gallery->type === 'L')
            <div class="mt-4">
                <img src="{{ asset('img/' . $gallery->image) }}" alt="Image {{ $gallery->type }}" class="img-fluid" style="max-width: 200px;">
                <p>Type d'image : {{ $gallery->type }}</p>
            </div>
        @endif
    @endforeach

    <!-- Affichage des autres images -->
    @foreach ($galleries as $gallery)
        @if ($gallery->type !== 'R' && $gallery->type !== 'L')
            <div class="mt-4">
                <img src="{{ asset('img/' . $gallery->image) }}" alt="Autre image" class="img-fluid" style="max-width: 200px;">
                <p>Type d'image : {{ $gallery->type }}</p>
            </div>
        @endif
    @endforeach

    <!-- Boutons Retour et Modifier -->
    <div class="mt-4">
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la page index</a>
        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary ml-2">Modifier le produit</a>
    </div>
</div>

@include('dashboard.layout.footer')
