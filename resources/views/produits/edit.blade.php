<!-- resources/views/produits/edit.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="container">
    <h1>Modifier le Produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $produit->name }}" required>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ $produit->prix }}">
        </div>
        <div class="form-group">
            <label for="qte_dispo">Quantité Disponible</label>
            <input type="number" class="form-control" id="qte_dispo" name="qte_dispo" value="{{ $produit->qte_dispo }}">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $produit->type }}">
        </div>
        <div class="form-group">
            <label for="date_ajout">Date d'Ajout</label>
            <input type="date" class="form-control" id="date_ajout" name="date_ajout" value="{{ $produit->date_ajout }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $produit->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

@include('dashboard.layout.footer')
