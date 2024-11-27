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

        <!-- Champs pour modifier les informations du produit -->
        <div class="form-group">
            <label for="nom">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="name" value="{{ old('name', $produit->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="qte_dispo">Quantité Disponible</label>
            <input type="number" class="form-control" id="qte_dispo" name="qte_dispo" value="{{ old('qte_dispo', $produit->qte_dispo) }}">
        </div>
        <div class="form-group">
            <label for="qte_dispo"> prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $produit->description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $produit->type) }}">
        </div>
        
        <div class="form-group">
            <label for="date_ajout">Date d'Ajout</label>
            <input type="date" class="form-control" id="date_ajout" name="date_ajout" value="{{ old('date_ajout', $produit->date_ajout) }}">
        </div>

        <div class="form-group">
            <label for="image">Image du Produit</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($produit->image)
                <small>Image actuelle : <img src="{{ asset('img/' . $produit->image) }}" alt="Image actuelle" style="max-width: 100px;"></small>
            @else
                <small>Aucune image actuelle pour ce produit.</small>
            @endif
        </div>

        <!-- Section pour modifier et supprimer les images de la galerie -->
        <div class="mt-4">
            <h2>Modifier et Supprimer les Images de la Galerie</h2>
            @foreach ($galleries as $gallery)
                @if ($gallery->produit_id === $produit->id)
                    <div class="form-group">
                        <label for="image_galerie_{{ $gallery->id }}">Image de type "{{ $gallery->type }}"</label>
                        <input type="file" class="form-control" id="image_galerie_{{ $gallery->id }}" name="image_galerie_{{ $gallery->id }}">
                        @if ($gallery->image)
                            <small>Image actuelle : <img src="{{ asset('img/' . $gallery->image) }}" alt="Image actuelle" style="max-width: 100px;"></small>
                            <br>
                            <!-- Ajouter une case à cocher pour supprimer l'image de la galerie -->
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="delete_image_galerie_{{ $gallery->id }}" name="delete_image_galerie_{{ $gallery->id }}">
                                <label class="form-check-label" for="delete_image_galerie_{{ $gallery->id }}">
                                    Supprimer cette image de la galerie
                                </label>
                            </div>
                        @else
                            <small>Aucune image actuelle pour ce type.</small>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <!-- Bouton Retour -->
    <div class="mt-4">
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la page index</a>
    </div>
</div>

@include('dashboard.layout.footer')
