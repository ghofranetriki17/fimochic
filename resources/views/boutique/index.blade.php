@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>
.product-card {
    border: 1px solid #ddd;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 20px;
    position: relative;
    transition: transform 0.3s ease, background-color 0.3s ease;
    background-color: #fff; /* Couleur de fond par défaut */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-card:hover {
    transform: scale(1.05);
    background-color: #cff4fc; /* Couleur pastel douce pour le fond au survol */
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
    height: 66%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .hover-image {
    opacity: 1;
}

.icon-container {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 0 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
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

</style>

  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Notre collection de boucles</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                                <!-- sort and search Start-->

                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                       <!-- Default Sorting -->
            <div class="col-lg-12">
                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                    <form method="GET" action="{{ route('boutique.index') }}">
                        <label for="sort">Trier par:</label>
                        <select id="sort" name="sort" class="border-0 form-select-sm bg-light me-3" onchange="this.form.submit()">
                            <option value="">Sélectionner</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom A-Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nom Z-A</option>
                        </select>
                    </form>
                </div>
            </div>
                            </div>
                        </div>
    <!-- Sort and Search Start -->
<div class="row g-4">
<div class="col-lg-3">
    <div class="row g-4">
        <!-- Categories -->
        <div class="col-lg-12">
            <div class="mb-3">
                <h4>Catégories</h4>
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

        
        <!-- Banner -->
        <div class="col-lg-12">
            <div class="position-relative">
                <img src="{{ asset('img/banner-fruits.jpg') }}" class="img-fluid w-100 rounded" alt="">
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Products Display -->
    <div class="col-lg-9">
        <div class="row g-4 justify-content-center">
            @foreach($produits as $produit)
                @php
                    $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();
                @endphp
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="product-card">
                        <div class="category-badge">{{ $produit->categorie }}</div>
                        <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}">
                        @if($galleryHover)
                            <img src="{{ asset('img/' . $galleryHover->image) }}" class="hover-image" alt="{{ $produit->name }} Hover">
                        @endif
                        <div class="card-body">
                            <h4>{{ $produit->name }}</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-dark fs-5 fw-bold mb-0">{{ $produit->prix }} DT</p>
                            </div>
                        </div>
                        <div class="icon-container">
                            <a href="#" class="btn-icon cart-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a href="{{ route('boutique.show', $produit->id) }}" class="btn-icon eye-icon">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
        <div class="col-12 text-center">
            {{ $produits->links('pagination::bootstrap-4') }}
        </div>
    </div>
        </div>
            <!-- Pagination Links -->
   
   
    </div>
</div>
<!-- Sort and Search End -->
@include('welcome.layout.footer')
