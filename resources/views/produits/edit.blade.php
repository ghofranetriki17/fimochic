<!-- resources/views/produits/edit.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Modifier le Produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="name" value="{{ old('name', $produit->name) }}" required>
        </div>
        <div class="form-group">
            <label for="qte_dispo">Quantité Disponible</label>
            <input type="number" class="form-control" id="qte_dispo" name="qte_dispo" value="{{ old('qte_dispo', $produit->qte_dispo) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $produit->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <!-- Bouton Retour -->
    <div class="mt-4">
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la page index</a>
    </div>
</div>

@include('dashboard.layout.footer')
