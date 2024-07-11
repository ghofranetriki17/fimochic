<!-- resources/views/produits/create.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="pagetitle">
    <h1>Créer un Produit</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
            <li class="breadcrumb-item">Gestion des Produits</li>
            <li class="breadcrumb-item active">Créer un Produit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Formulaire de Création de Produit</h5>

                    <!-- Form for creating a new product -->
                    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom du Produit</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" id="prix" name="prix">
                        </div>
                        <div class="form-group">
                            <label for="qte_dispo">Quantité Disponible</label>
                            <input type="number" class="form-control" id="qte_dispo" name="qte_dispo">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="date_ajout">Date d'Ajout</label>
                            <input type="date" class="form-control" id="date_ajout" name="date_ajout">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <!-- Sélection des attributs et valeurs -->
                        @foreach ($attributs as $attribut)
                        <div class="form-group">
                            <label for="attribut_{{ $attribut->id }}">{{ $attribut->nom }}</label>
                            <select class="form-control" id="attribut_{{ $attribut->id }}" name="attribute_values[{{ $attribut->id }}][]" multiple>
                                @foreach ($attribut->valeurs as $valeur)
                                <option value="{{ $valeur->id }}">{{ $valeur->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endforeach

                        <!-- Champ pour télécharger une photo -->
                        <div class="form-group">
                            <label for="photo">Photo du Produit</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                    <!-- End Form for creating a new product -->

                </div>
            </div>
        </div>
    </div>
</section>
@include('dashboard.layout.footer')
