@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>
    .modal-content {
    border-radius: 15px;
    overflow: hidden;
}

.modal-header {
    border-bottom: 1px solid #ddd;
}

.modal-body img {
    border-radius: 10px;
}

.product-details {
    padding: 10px;
}

    /* Conteneur des icônes */


/* Affichage des icônes au survol */
.product-card:hover .icon-container {
    opacity: 1;
}

/* Style pour les boutons d'icônes */
.btn-icon {
    background-color: #ffb3c1; /* Fond pastel doux pour les boutons */
    border: none; /* Supprime la bordure */
    border-radius: 50%; /* Bordure circulaire */
    width: 30px; /* Largeur uniforme */
    height: 30px; /* Hauteur uniforme */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
    color: #fff; /* Couleur des icônes */
    font-size: 0.9em; /* Taille des icônes */
    transition: background-color 0.3s ease, color 0.3s ease; /* Transition pour l'effet de survol */
    cursor: pointer; /* Curseur pointer pour l'interaction */
    
}

/* Effet de survol pour les boutons d'icônes */
.btn-icon:hover {
    background-color: #fff; /* Fond blanc au survol */
    color: #ffb3c1; /* Couleur des icônes au survol */
}

/* Style spécifique pour le bouton d'ajout au panier */
.cart-icon {
    margin-right: 10px; /* Espacement entre les boutons */
}

/* Style spécifique pour le bouton de vue du produit */
.eye-icon {
    margin-left: 10px; /* Espacement entre les boutons */
}

/* Style pour l'input de quantité */



.input-group {
    max-width: 600px; /* Ajustez la largeur selon vos besoins */
}

.input-group .form-control {
    border-radius: 0.375rem; /* Pour arrondir les coins */
}

.input-group .input-group-text {
    background-color: #f8f9fa; /* Couleur d'arrière-plan */
    border-radius: 0.375rem; /* Pour arrondir les coins */
}

.product-card {
    border: 1px solid #ddd;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 50px;
    height: 330px;
    position: relative;
    transition: transform 0.3s ease, background-color 0.3s ease;
    background-color: #fff; /* Couleur de fond par défaut */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}



.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: opacity 0.3s ease;
}

.product-card .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 60%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.3s ease;

}

.product-card:hover .hover-image {
    opacity: 1;
}

.icon-container {
    position: absolute;
    bottom: 0px;
    left: 11%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column; /* Aligner les icônes verticalement */
    width: auto; /* Ajuster la largeur automatiquement */
    opacity: 0;
    transition: opacity 0.3s ease;
}

.icon-container .btn-icon {
    margin: 5px 0; /* Espacement entre les icônes */
}


.product-card:hover .icon-container {
    display: flex;
    opacity: 1;
}

.icon-container a {
    color: #fff; /* Couleur des icônes */
    font-size: 10px;
    margin: 0 50px;
    transition: color 0.3s ease, background-color 0.3s ease;
    text-align: center;
    background-color: #ffb3c1; /* Fond pastel doux pour les icônes */
    border-radius: 50%;
    padding: 10px;
}


.icon-container a:hover {
    color: #ffb3c1; /* Couleur des icônes au survol */
    background-color: #fff; /* Fond blanc au survol */
}

.card-body {
    padding: 15px;
    text-align: center;
    background-color: #fff;
}


.card-body h4 {
    margin: 10px 0;
    font-size: 1.2em;
    color: #ffb3c1; /* Couleur girly pastel pour le nom du produit */
}

.card-body p {
    margin: auto;
    font-size: 1.2em;
    color: #cff4fc!important; /* Couleur pastel douce pour le prix */
    
}




.btn-info {
    font-size: 0.9em;
    background-color: #ffb3c1; /* Couleur girly pastel pour le bouton */
    border-color: #ffb3c1;
    border-radius: 5px;
}

.btn-info:hover {
    background-color: #ff8f9c; /* Couleur plus foncée au survol */
    border-color: #ff8f9c;
}


/* Conteneur de la pagination */
.pagination {
    display: flex;
    justify-content: center;
    padding: 1rem 0;
    margin: 0;
}

/* Liens de pagination */
.pagination .page-link {
    display: block;
    padding: 0.5rem 1rem;
    margin: 0 0.1rem;
    border: 1px solid #ddd;
    border-radius: 0.25rem;
    color: #007bff; /* Couleur des liens */
    text-decoration: none;
    font-size: 0.9rem;
    background-color: #fff;
    transition: background-color 0.3s, color 0.3s;
}

/* Liens de pagination au survol */
.pagination .page-link:hover {
    background-color: #e9ecef; /* Couleur de fond au survol */
    color: #0056b3; /* Couleur du texte au survol */
}

/* Liens de pagination désactivés */
.pagination .page-item.disabled .page-link {
    color: #6c757d;
    background-color: #fff;
    border: 1px solid #ddd;
    cursor: not-allowed;
}

/* Liens de pagination actifs */
.pagination .page-item.active .page-link {
    background-color: #007bff; /* Couleur de fond pour l'élément actif */
    color: #fff; /* Couleur du texte pour l'élément actif */
    border-color: #007bff; /* Couleur de la bordure pour l'élément actif */
}

/* Flèches de pagination */
.pagination .page-item .page-link i {
    font-size: 1rem; /* Taille des icônes de navigation */
}
/* Styles pour la section des nouveaux produits */
.nouveaux-produits {
    padding: 20px;
    background-color: #f5f5f5; /* Utilisation d'une couleur douce pour l'arrière-plan */
    border-radius: 8px;
}

.nouveaux-produits h2 {
    font-size: 2em;
    color: #333; /* Couleur sombre pour le titre */
    margin-bottom: 20px;
    text-align: center;
}

.produits-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacement entre les cartes de produits */
    justify-content: center; /* Centre les cartes de produits */
}

.produit-card {
    background-color: #fff; /* Fond blanc pour les cartes */
    border: 1px solid #ddd; /* Bordure légère */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
    overflow: hidden; /* Évite le débordement du contenu */
    width: 250px; /* Largeur fixe des cartes */
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Effets de transition pour l'animation */
}

.produit-card img {
    width: 100%;
    height: 150px; /* Hauteur fixe pour les images */
    object-fit: cover; /* Ajuste l'image pour qu'elle couvre entièrement le conteneur */
}

.produit-card h3 {
    font-size: 1.5em;
    color: #333; /* Couleur sombre pour le nom du produit */
    margin: 10px 0;
}

.produit-card p {
    font-size: 1em;
    color: #666; /* Couleur plus claire pour les descriptions */
    margin: 5px 0;
}

.produit-card:hover {
    transform: scale(1.05); /* Légère augmentation de la taille de la carte au survol */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée au survol */
}
.product-images {
    display: flex;
    justify-content: center;
    align-items: center;
}

.left-images, .right-images {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.main-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.main-image img {
    max-width: 100%;
    height: auto;
}

.left-images img, .right-images img {
    max-width: 205PX; /* Ajuster la taille des images gauche et droite */
    height: auto;
    margin: 0; /* Pas d'espacement entre les images */
}


</style>







<!-- Shop Page Header with QR Code Introduction Start -->
<div class="container-fluid page-header py-3">
    <h1 class="text-center text-white display-4">Bienvenue à Notre Boutique</h1>
    <!-- QR Code Introduction Section Start -->
<div class="container-fluid qr-code-section py-3">
    <div class="text-center mb-4">
        <h2 class="display-5 text-primary">Essayez Nos Boucles d'Oreilles Virtuellement!</h2>
        <p class="lead text-secondary">Scannez le code QR unique associé à chaque produit pour voir comment il vous va grâce à notre technologie de réalité augmentée!</p>
    </div>
    
</div>
<!-- QR Code Introduction Section End -->

</div>
 


<!-- CSS for QR Code Introduction Section -->


        
        






        <div class="nouveaux-produits">
    <div class="container py-5">
        <h2 class="text-center mb-4">Révélations Fraîches</h2>
        <div id="nouveauxProduitsCarousel" class="carousel slide">
            <div class="carousel-inner">
                @forelse($nouveauxProduits->chunk(4) as $chunk) <!-- Ajustez la taille du chunk selon le nombre d'articles par diapositive -->
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row g-4 justify-content-center">
                            @foreach($chunk as $produit)
                                @php
                                                $qrCodeImage = $galleries->where('produit_id', $produit->id)->where('type', 'qr')->first();

                                    $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();
                                    $promotion = $produit->promotions->first(); // Supposons qu'il y a une seule promotion active
                                @endphp
                                <div class="col-md-3 col-lg-3 col-xl-3"> <!-- 4 produits par ligne -->
                                <div class="product-card">
                                        <div class="category-badge">{{ $produit->categorie }}</div>
                                        <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}">
                                        @if($galleryHover)
                                            <img src="{{ asset('img/' . $galleryHover->image) }}" class="hover-image" alt="{{ $produit->name }} Hover">
                                        @endif
                                        <div class="card-body">
                                        @if($qrCodeImage)
    <a href="#" class="btn-icon qr-icon" data-bs-toggle="modal" data-bs-target="#qrrModal{{ $produit->id }}">
        <i class="fas fa-qrcode"></i>
    </a>
@endif
                                            <h4>{{ $produit->name }}</h4>


                                             <!-- Icône QR Code et lien vers la modale -->
                       
                                            <div class="d-flex justify-content-between">
                                                @if($promotion)
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        <span class="text-decoration-line-through">{{ $produit->prix }} DT</span>
                                                        <span class="text-danger ms-2">{{ $promotion->new_price }} DT</span>
                                                    </p>
                                                @else
                                                    <p class="text-dark fs-5 fw-bold mb-0">{{ $produit->prix }} DT</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Container des icônes -->
                                        <div class="icon-container">
                                            <!-- Formulaire d'ajout au panier -->
                                            <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                                <button type="submit" class="btn-icon cart-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>

                                            <!-- Lien vers la fenêtre modale -->
                                            <button type="button" class="btn-icon eye-icon" data-bs-toggle="modal" data-bs-target="#producttModal{{ $produit->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>
                                  <!-- Modale QR Code -->
            @if($qrCodeImage)
                <div class="modal fade" id="qrrModal{{ $produit->id }}" tabindex="-1" aria-labelledby="qrModalLabel{{ $produit->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="qrModalLabel{{ $produit->id }}">Code QR pour {{ $produit->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('img/' . $qrCodeImage->image) }}" alt="QR Code" class="img-fluid">
                                <p>Scannez ce code QR pour voir le produit en réalité augmentée.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

<!-- Fenêtre modale -->
<div class="modal fade" id="producttModal{{ $produit->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $produit->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" 
             @php
                 $leftImage = $produit->galleries->where('type', 'L')->first();
             @endphp
             style="@if($leftImage) background-image: url('{{ asset('img/' . $leftImage->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; @endif">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel{{ $produit->id }}">Détails du Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="details-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="image-gallery d-flex justify-content-center align-items-center">
                                <div class="left-images">
                                    @foreach ($produit->galleries as $gallery)
                                        @if ($gallery->type == 'L')
                                            <img src="{{ asset('img/' . $gallery->image) }}" alt="Image L" class="img-fluid mb-2">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="main-image mx-0">
                                    <img src="{{ asset('img/' . $produit->image) }}" alt="Image du produit" class="img-fluid mb-2">
                                </div>
                                <div class="right-images">
                                    @foreach ($produit->galleries as $gallery)
                                        @if ($gallery->type == 'R')
                                            <img src="{{ asset('img/' . $gallery->image) }}" alt="Image R" class="img-fluid mb-2">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <h4 class="product-title">{{ $produit->name }}</h4>
                            <p class="category-label text-muted">{{ $produit->categorie }}</p>
                            <p class="product-description">{{ $produit->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="price-info text-dark fs-5 fw-bold mb-0">
                                    @if($produit->promotions->isNotEmpty())
                                        <span class="original-price text-decoration-line-through">{{ $produit->prix }} DT</span>
                                        <span class="discounted-price text-danger ms-2">{{ $produit->promotions->first()->new_price }} DT</span>
                                    @else
                                        {{ $produit->prix }} DT
                                    @endif
                                </p>
                                <form action="{{ route('panier.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <button type="submit" class="btn btn-primary add-to-cart-btn">Ajouter au Panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>




                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <div class="text-center">
                            <p>Aucun produit nouveau pour le moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#nouveauxProduitsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#nouveauxProduitsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>
</div>

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Notre collection</h1>


                <div class="row g-4">
                    <div class="col-lg-12">
                                <!-- sort and search Start-->

                        <div class="row g-4">
                            <div class="col-xl-3">
                            <form method="GET" action="{{ route('boutique.index') }}" class="w-100 mx-auto d-flex">
    <div class="input-group w-100">
        <input 
            type="search" 
            name="search" 
            class="form-control p-3" 
            placeholder="Rechercher des produits..." 
            aria-describedby="search-icon-1" 
            value="{{ request()->input('search') }}"
        >
        <span id="search-icon-1" class="input-group-text p-3">
            <button type="submit" class="btn btn-link p-0">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
    <div class="tri-container">
        <form method="GET" action="{{ route('boutique.index') }}">
            <label for="sort">Trier par:</label>
            <select id="sort" name="sort" class="form-select" onchange="this.form.submit()">
                <option value="">Sélectionner</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom A-Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nom Z-A</option>
            </select>
        </form>
    </div>
</div>



    <!-- Sort and Search Start -->
<div class="row g-4">
<div class="col-lg-3">
    <div class="row g-4">
        <!-- Categories -->
        <div class="col-lg-12">
            <div class="mb-3">
                <h4>filtres</h4>
                <ul class="list-group">
                    @foreach($attributs as $attribut)
                        <li class="list-group-item">
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $attribut->id }}" aria-expanded="false" aria-controls="collapse{{ $attribut->id }}">
                                {{ $attribut->nom }}
                            </button>
                            <div class="collapse" id="collapse{{ $attribut->id }}">
                                <ul class="list-group mt-2">
                                    @foreach($attribut->valeurs as $valeur)
                                        <li class="list-group-item">
                                            <a href="{{ route('boutique.index', ['valeur_id' => $valeur->id]) }}">
                                                {{ $valeur->nom }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
 <!-- Filtre de Prix -->
<div class="col-lg-12">
    <div class="mb-3">
        <h4 class="mb-2">Prix</h4>
        <form method="GET" action="{{ route('boutique.index') }}">
            <input type="range" class="form-range w-100" id="rangeMin" name="price_min" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" oninput="updateMinValue(this.value)">
            <output id="minAmount" name="minAmount">{{ $minPrice }}</output>
            <input type="range" class="form-range w-100" id="rangeMax" name="price_max" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" oninput="updateMaxValue(this.value)">
            <output id="maxAmount" name="maxAmount">{{ $maxPrice }}</output>
            <button type="submit" class="btn btn-primary mt-2">Filtrer</button>
        </form>
    </div>
</div>

<script>
    function updateMinValue(val) {
        document.getElementById('minAmount').textContent = val;
    }
    
    function updateMaxValue(val) {
        document.getElementById('maxAmount').textContent = val;
    }
</script>

        


    
    </div>
</div>


<!-- Products Display -->
<div class="col-lg-9">
    <div class="filter-buttons mb-4">
        @foreach($types as $type)
            <a href="{{ route('boutique.index', ['type' => $type]) }}" class="btn btn-primary">{{ $type }}</a>
        @endforeach
        <a href="{{ route('boutique.index') }}" class="btn btn-secondary">Tous</a>
    </div>

    <div class="row g-4 justify-content-center">
        @foreach($produits as $produit)
            @php
                $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();
                $promotion = $produit->promotions->first();
                $qrCodeImage = $galleries->where('produit_id', $produit->id)->where('type', 'qr')->first();
            @endphp
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="product-card">
                    <div class="category-badge">{{ $produit->categorie }}</div>
                    <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}" class="main-product-image">
                    @if($galleryHover)
                        <img src="{{ asset('img/' . $galleryHover->image) }}" class="hover-image" alt="{{ $produit->name }} Hover">
                    @endif
                    
                    <div class="card-body">
                           <!-- Icône QR Code et lien vers la modale -->
                           @if($qrCodeImage)
                            <a href="#" class="btn-icon qr-icon" data-bs-toggle="modal" data-bs-target="#qrModal{{ $produit->id }}">
                                <i class="fas fa-qrcode"></i>
                            </a>
                        @endif
                        <h4>{{ $produit->name }}</h4>

                     

                        <div class="d-flex justify-content-between">
                            @if($promotion)
                                <p class="text-dark fs-5 fw-bold mb-0">
                                    <span class="text-decoration-line-through">{{ $produit->prix }} DT</span>
                                    <span class="text-danger ms-2">{{ $promotion->new_price }} DT</span>
                                </p>
                            @else
                                <p class="text-dark fs-5 fw-bold mb-0">{{ $produit->prix }} DT</p>
                            @endif
                        </div>
                    </div>

                    <!-- Container des icônes -->
                    <div class="icon-container">
                        <!-- Formulaire d'ajout au panier -->
                        <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                            <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                            <button type="submit" class="btn-icon cart-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>

                        <!-- Lien vers la fenêtre modal -->
                        <button type="button" class="btn-icon eye-icon" data-bs-toggle="modal" data-bs-target="#productModal{{ $produit->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modale QR Code -->
            @if($qrCodeImage)
                <div class="modal fade" id="qrModal{{ $produit->id }}" tabindex="-1" aria-labelledby="qrModalLabel{{ $produit->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="qrModalLabel{{ $produit->id }}">Code QR pour {{ $produit->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('img/' . $qrCodeImage->image) }}" alt="QR Code" class="img-fluid">
                                <p>Scannez ce code QR pour voir le produit en réalité augmentée.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Fenêtre modale pour les détails du produit -->
            <div class="modal fade" id="productModal{{ $produit->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $produit->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content product-modal-background-{{ $produit->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{ $produit->id }}">Détails du Produit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="product-details">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-images d-flex justify-content-center align-items-center">
                                            <div class="left-images">
                                                @foreach ($produit->galleries as $gallery)
                                                    @if ($gallery->type == 'L')
                                                        <img src="{{ asset('img/' . $gallery->image) }}" alt="Image L" class="img-fluid">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <!-- Carrousel d'images -->
                                            <div id="carousel{{ $produit->id }}" class="carousel slide mx-0">
                                                <div class="carousel-inner">
                                                    <!-- Image principale -->
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('img/' . $produit->image) }}" alt="Image du produit" class="d-block w-100">
                                                    </div>
                                                    <!-- Images de type "autre" -->
                                                    @foreach ($produit->galleries->where('type', 'autre') as $image)
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('img/' . $image->image) }}" alt="Image autre" class="d-block w-100">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $produit->id }}" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $produit->id }}" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="right-images">
                                                @foreach ($produit->galleries as $gallery)
                                                    @if ($gallery->type == 'R')
                                                        <img src="{{ asset('img/' . $gallery->image) }}" alt="Image R" class="img-fluid">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h4>{{ $produit->name }}</h4>
                                        <p class="text-muted">{{ $produit->categorie }}</p>
                                        <p>{{ $produit->description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                @if($produit->promotions->isNotEmpty())
                                                    <span class="text-decoration-line-through">{{ $produit->prix }} DT</span>
                                                    <span class="text-danger ms-2">{{ $produit->promotions->first()->new_price }} DT</span>
                                                @else
                                                    {{ $produit->prix }} DT
                                                @endif
                                            </p>
                                            <form action="{{ route('panier.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                                <button type="submit" class="btn btn-primary">Ajouter au Panier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</div>
<!-- Sort and Search End -->
 

 <!-- Section Produits en Promotion -->
<div class="container py-5">
    <h1 class="text-center mb-4">Offre Spéciale en Cours!</h1>
    <div id="produitsEnPromotionCarousel" class="carousel slide">
        <div class="carousel-inner">
            @forelse($produitsEnPromo->chunk(3) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        @foreach($chunk as $produit)
                            <div class="product-card">
                                <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}">
                                <div class="card-body">
                                    <h4>{{ $produit->name }}</h4>
                                    @if($produit->promotions->isNotEmpty())
                                        @php
                                            $promotion = $produit->promotions->first();
                                        @endphp
                                        <p class="text-dark fs-5 fw-bold mb-0">
                                            <span class="text-decoration-line-through">{{ $produit->prix }} DT</span>
                                            <span class="text-danger ms-2">{{ $promotion->new_price }} DT</span>
                                        </p>
                                    @else
                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $produit->prix }} DT</p>
                                    @endif
                                    <div class="icon-container">
                                        <!-- Formulaire d'ajout au panier -->
                                        <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                            <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                            <button type="submit" class="btn-icon cart-icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </form>
                                        <!-- Lien vers la fenêtre modal -->
                                        <button type="button" class="btn-icon eye-icon" data-bs-toggle="modal" data-bs-target="#producttttModal{{ $produit->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="carousel-item active">
                    <div class="text-center">
                        <p>Aucun produit en promotion pour le moment.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#produitsEnPromotionCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#produitsEnPromotionCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>

<!-- Fenêtres modales pour chaque produit -->
@foreach($produitsEnPromo as $produit)
    <div class="modal fade" id="producttttModal{{ $produit->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $produit->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"
                 @php
                     $leftImage = $produit->galleries->where('type', 'L')->first();
                 @endphp
                 style="@if($leftImage) background-image: url('{{ asset('img/' . $leftImage->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; @endif">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel{{ $produit->id }}">Détails du Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="details-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="image-gallery d-flex justify-content-center align-items-center">
                                    <div class="left-images">
                                        @foreach ($produit->galleries as $gallery)
                                            @if ($gallery->type == 'L')
                                                <img src="{{ asset('img/' . $gallery->image) }}" alt="Image L" class="img-fluid mb-2">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="main-image mx-0">
                                        <img src="{{ asset('img/' . $produit->image) }}" alt="Image du produit" class="img-fluid mb-2">
                                    </div>
                                    <div class="right-images">
                                        @foreach ($produit->galleries as $gallery)
                                            @if ($gallery->type == 'R')
                                                <img src="{{ asset('img/' . $gallery->image) }}" alt="Image R" class="img-fluid mb-2">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h4 class="product-title">{{ $produit->name }}</h4>
                                <p class="category-label text-muted">{{ $produit->categorie }}</p>
                                <p class="product-description">{{ $produit->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="price-info text-dark fs-5 fw-bold mb-0">
                                        @if($produit->promotions->isNotEmpty())
                                            <span class="original-price text-decoration-line-through">{{ $produit->prix }} DT</span>
                                            <span class="discounted-price text-danger ms-2">{{ $produit->promotions->first()->new_price }} DT</span>
                                        @else
                                            {{ $produit->prix }} DT
                                        @endif
                                    </p>
                                    <form action="{{ route('panier.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                        <input type="number" name="quantite" value="1" min="1" class="quantity-selector">
                                        <button type="submit" class="btn btn-primary add-to-cart-btn">Ajouter au Panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

 <!-- Create Your Earrings Section Start -->
 <div class="container-fluid create-earrings-section py-5">
    <div class="text-center">
        <h2 class="display-4 text-primary mb-4">Créez Vos Propre Boucles d'Oreilles!</h2>
        <p class="lead text-secondary mb-4">Exprimez votre créativité et concevez des boucles d'oreilles uniques qui reflètent votre style personnel. Utilisez notre outil de personnalisation pour voir vos idées prendre vie!</p>
        <a href="/page-customize" class="btn btn-primary btn-lg">Commencez à Créer</a>
    </div>
</div>
<!-- Create Your Earrings Section End -->
@include('welcome.layout.footer')
