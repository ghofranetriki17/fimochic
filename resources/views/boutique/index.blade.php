@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>
    /* Style général des titres */
.filter-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #d63384; /* Couleur rose foncé */
    margin-bottom: 20px;
}

/* Conteneur pour les plages de valeurs */
.range-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.range-container .form-range {
    -webkit-appearance: none; /* Retire le style par défaut du slider */
    background: #f5d7dc; /* Fond rosé clair pour le slider */
    height: 8px; /* Hauteur du slider */
    border-radius: 5px; /* Coins arrondis */
    width: calc(100% - 100px); /* Ajuste la largeur pour laisser de l'espace pour les valeurs */
    margin: 0;
}

.range-container .form-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    background: #d63384; /* Couleur rose foncé pour le curseur */
    border-radius: 50%;
    width: 20px;
    height: 20px;
    cursor: pointer;
}

.range-container .form-range::-moz-range-thumb {
    background: #d63384;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    cursor: pointer;
}

.range-container output {
    font-size: 1rem;
    color: #d63384; /* Couleur rose foncé pour les valeurs */
    width: 80px;
    text-align: center;
}

/* Style du bouton de filtre */
.btn-primary {
    background-color: #d63384; /* Couleur rosé foncé */
    border: none;
    border-radius: 5px; /* Coins arrondis */
    padding: 10px 20px;
    color: white;
    font-weight: 600;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: white !important; /* Couleur rosé plus foncé au survol */
    color: #d63384;

}
.nouveaux-produits {
    margin-top: 40px;
    height: 500px; /* Ajustez la valeur en fonction de vos besoins */
}


    /* Style général des titres */
.filter-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #d63384; /* Couleur rose foncé */
    margin-bottom: 20px; /* Espacement sous le titre */
}

/* Style de la liste de filtres */
.list-group {
    border: none; /* Retire la bordure par défaut */
    background-color: transparent; /* Fond transparent */
}

.list-group-item {
    border: 1px solid #f8d7da; /* Bordure légère en rose clair */
    border-radius: 8px; /* Coins arrondis */
    margin-bottom: 5px; /* Espacement entre les éléments */
    background-color: #fff0f6; /* Fond légèrement rosé */
    transition: background-color 0.3s, box-shadow 0.3s; /* Transition douce */
}

.list-group-item:hover {
    background-color: #f7c6c9; /* Couleur de fond au survol en rose plus intense */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre portée au survol */
}

/* Style des boutons */
.btn-link {
    color: #d63384; /* Couleur du texte en rose foncé */
    text-decoration: none; /* Retire le soulignement */
    font-weight: 600; /* Texte en gras */
    transition: color 0.3s; /* Transition douce pour la couleur */
}

.btn-link:hover {
    color: #c8235c; /* Couleur du texte au survol en rose plus foncé */
}

/* Style des sous-listes */
.collapse .list-group {
    padding-left: 0; /* Retire le padding gauche */
}

.collapse .list-group-item {
    border: none; /* Retire la bordure des éléments internes */
    background-color: #fff0f6; /* Fond rosé pour les sous-listes */
}

.collapse .list-group-item a {
    color: #d63384; /* Couleur du texte des liens en rose foncé */
    text-decoration: none; /* Retire le soulignement des liens */
}

.collapse .list-group-item a:hover {
    color: #c8235c; /* Couleur du texte au survol des liens en rose plus foncé */
}

.modal-content {
    border: #ff949400;
    border-radius: 15px;
    background-color: #2d1621;
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
    height: 350px !important;
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
    margin: 8px 0; /* Espacement entre les icônes */
}
.likes-info {
    color: #fbb9c5;
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
    color: #46bbd5 !important;
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

/* Styles CSS girly pour la pagination */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-item {
    margin: 0 5px;
}

.pagination .page-link {
    color: #ff69b4; /* Couleur de texte rose vif */
    background-color: #ffe4e1; /* Fond rose pâle */
    border: 1px solid #ffb6c1; /* Bordure rose clair */
    padding: 8px 12px; /* Espacement pour les liens de pagination */
    border-radius: 50%; /* Arrondir les bords des liens de pagination */
    transition: background-color 0.3s, color 0.3s; /* Animation de transition pour le survol */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ajout d'une légère ombre */
}

.pagination .page-link:hover {
    color: #ffffff; /* Couleur du texte au survol */
    background-color: #ff69b4; /* Couleur de fond au survol */
    border-color: #ff69b4; /* Bordure au survol */
}

.pagination .page-item.active .page-link {
    z-index: 1;
    color: #ffffff; /* Couleur du texte pour la page active */
    background-color: #ff1493; /* Couleur de fond pour la page active */
    border-color: #ff1493; /* Bordure pour la page active */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée pour la page active */
}

.pagination .page-item.disabled .page-link {
    color: #ffc0cb; /* Couleur du texte pour les liens désactivés */
    background-color: #fff0f5; /* Fond pour les liens désactivés */
    border-color: #ffc0cb; /* Bordure pour les liens désactivés */
}

/* Styles pour la section des nouveaux produits */
.nouveaux-produits {
    padding: 20px;
    border-radius: 8px;
}

.nouveaux-produits h2 {
    font-size: 2em;
    font-family: Arial, sans-serif ;
    color: #783f86; /* Couleur sombre pour le titre */
    margin-bottom: 20px;
    text-align: center;
    margin-top: 10px;
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

/* Base styles for the text */
.text-content {
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

/* Animation for fading in and out */
.fade-in-out {
    animation: fadeInOut 10s infinite;
}

@keyframes fadeInOut {
    0%, 100% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
}

</style>







<!-- Shop Page Header with QR Code Introduction Start -->
<div class="container-fluid page-header py-3">
    
    <!-- QR Code Introduction Section Start -->
    <div class="text-center mb-4">
        <h3 class="display-5 text-primary" id="intro-title"></h3>
        <p class="lead text-secondary" id="intro-description"></p>
    </div>
    <!-- QR Code Introduction Section End -->
</div>


<!-- Add the following JavaScript at the bottom of your Blade template or in a separate JS file -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const phrases = [
        { title: 'Bienvenue à Notre Boutique', description: '' },
        { title: 'Des Créations Uniques en Fimo', description: 'Plongez dans notre collection exceptionnelle de bijoux faits main, où chaque pièce raconte une histoire.' },

        { title: 'Découvrez Nos Produits en 3D', description: 'Vivez une expérience immersive en scannant le code QR pour voir nos créations en réalité augmentée, comme si vous les aviez déjà en main.' },
        { title: 'Concevez Votre Chef-d\'Œuvre Personnel', description: 'Rendez votre pièce vraiment unique en visitant notre page de personnalisation et en ajoutant votre touche personnelle.' },

        { title: 'Cadeaux Personnalisés à Votre Image', description: 'Transformez chaque occasion en un souvenir inoubliable avec nos boîtes sur-mesure, créées selon vos préférences et vos célébrations.' }
    ];

    let currentIndex = 0;

    function showPhrase(index) {
        const titleElement = document.getElementById('intro-title');
        const descriptionElement = document.getElementById('intro-description');

        titleElement.textContent = phrases[index].title;
        descriptionElement.textContent = phrases[index].description;

        // Add fade-in-out class for animation
        titleElement.classList.add('fade-in-out');
        descriptionElement.classList.add('fade-in-out');

        // Remove class after animation to allow reapplication
        setTimeout(() => {
            titleElement.classList.remove('fade-in-out');
            descriptionElement.classList.remove('fade-in-out');
        }, 10000); // 10 seconds matches the animation duration
    }

    function cyclePhrases() {
        currentIndex = (currentIndex + 1) % phrases.length;
        showPhrase(currentIndex);
    }

    // Show the first phrase initially
    showPhrase(currentIndex);

    // Cycle through phrases every 10 seconds
    setInterval(cyclePhrases, 10000);
});

</script>

 


<!-- CSS for QR Code Introduction Section -->


        
        






        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="display-5 text-primary mb-4"></h1>


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
        <h4 class="filter-title">Filtres</h4>
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
        <h4 class="filter-title">Prix</h4>
        <form method="GET" action="{{ route('boutique.index') }}">
            <div class="range-container">
                <input type="range" class="form-range" id="rangeMin" name="price_min" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" oninput="updateMinValue(this.value)">
                <output id="minAmount">{{ $minPrice }}</output>
            </div>
            <div class="range-container mt-3">
                <input type="range" class="form-range" id="rangeMax" name="price_max" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" oninput="updateMaxValue(this.value)">
                <output id="maxAmount">{{ $maxPrice }}</output>
            </div>
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

        <!-- Create Your Earrings Section Start -->
<!-- Create Your Earrings Section Start -->
<div class="container-fluid create-earrings-section py-3" id="create-earrings-section">
    <div class="text-center">
        <h4  id="create-earrings-title">Créez Vos Boucles d'Oreilles!</h4>
        <p  id="create-earrings-description">Exprimez votre créativité avec des boucles d'oreilles uniques. Utilisez notre outil de personnalisation pour donner vie à vos idées!</p>
        <a href="/page-customize" class="btn btn-primary btn-md" id="create-earrings-button">Commencez à Créer</a>
    </div>
</div>
<style>#create-earrings-section {
    background-color: #f5f7fa; /* Pastel Blue */
    border-radius: 8px;
    padding: 20px;
}

#create-earrings-title {
    color: #6c757d; /* Pastel Gray */
}

#create-earrings-description {
    color: #495057; /* Pastel Dark Gray */
}

#create-earrings-button {
    background-color: #d1e7dd; /* Pastel Green */
    border-color: #d1e7dd; /* Match border color with background */
}

#create-earrings-button:hover {
    background-color: #cff4fc; /* Pastel Teal */
    border-color: #cff4fc; /* Match border color with background */
}
</style>

<!-- Section Produits en Promotion -->
<div class="container py-5">
    <h4 class="text-center mb-4">À ne pas rater!</h4>
    <div id="produitsEnPromotionCarousel" class="carousel slide">
        <div class="carousel-inner">
            @forelse($produitsEnPromo->chunk(1) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        @foreach($chunk as $produit)
                            @php
                                // Remplacez ceci par la logique réelle pour obtenir le nombre de likes
                                $likesCount =  $produit->getLikesCountAttribute($produit->id) 

                            @endphp
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

                                    <!-- Affichage du nombre de likes -->
                                    <div class="likes-info">
                                        <i class="fas fa-heart"></i> {{ $likesCount }}
                                    </div>

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
                 style="@if($leftImage) background-image: url('#'); background-size: cover; background-position: center; background-repeat: no-repeat; @endif">
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
                            <!-- Section des commentaires et likes -->
                            <div class="col-md-12 mt-4">
                            <h5>Commentaires des Clients</h5>
@foreach ($produit->comments as $comment)
    @if ($comment->commentaire)
        <div class="comment mb-3">
            <p><strong>{{ $comment->client->nom }}:</strong> {{ $comment->commentaire }}</p>
            @if ($comment->image)
                <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image" width="100px"class="img-fluid mb-2">
            @endif
            @if ($comment->client_id == Auth::id())
                <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endif
@endforeach

                                
                                <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('product_like_comments.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="mb-3">
                                        <textarea name="commentaire" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
                                </form>
                                                 <!-- Section pour le like/dislike -->
<div class="mt-4 text-center">
    <p><strong>Coup de cœur ? Cliquez ici !</strong></p>
    @if ($produit->userHasLiked(Auth::id()))
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="fas fa-heart text-danger" style="font-size: 24px;"></i>
            </button>
        </form>
    @else
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="far fa-heart text-success" style="font-size: 24px;"></i>
            </button>
        </form>
    @endif
</div>
                                                                    <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('product_like_comments.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="mb-3">
                                        <textarea name="commentaire" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                    </div>
                                    <div class="mb-3">
        <label for="photo" class="form-label">Ajouter une photo</label>
        <input type="file" name="photo" class="form-control" id="photo">
    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
                                </form>




                                        <!-- Section des commentaires et likes -->
                            <div class="col-md-12 mt-4">
                            <h5>Commentaires des Clients</h5>
@foreach ($produit->comments as $comment)
    @if ($comment->commentaire)
        <div class="comment mb-3">
            <p><strong>Client #{{ $comment->client->name }}:</strong> {{ $comment->commentaire }}</p>
            @if ($comment->image)
                <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image"width="100px" class="img-fluid mb-2">
            @endif
            @if ($comment->client_id == Auth::id())
                <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endif
@endforeach

                                


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







<!-- Products Display -->
<div class="col-lg-9">
    <div class="filter-buttons mb-4">
        @foreach($types as $type)
            <a href="{{ route('boutique.index', ['type' => $type]) }}" class="btn btn-primary">{{ $type }}</a>
        @endforeach
        <a href="{{ route('boutique.index') }}" class="btn btn-primary">Tous</a>
    </div>

    <div class="row g-4 justify-content-center">
        @foreach($produits as $produit)
        @if($produit->qte_dispo > 0)

        @php
                                // Remplacez ceci par la logique réelle pour obtenir le nombre de likes
                                $likesCount =  $produit->getLikesCountAttribute($produit->id) 

                            @endphp
            @php
                $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();
                $promotion = $produit->promotions->first();
                $qrCodeImage = $galleries->where('produit_id', $produit->id)->where('type', 'qr')->first();
            @endphp
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="product-card">
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                    @if($produit->qte_dispo > 5)
                    {{ $produit->type}}
@endif
       <!-- Affichage de la quantité disponible -->
                        @if($produit->qte_dispo < 5 && $produit->qte_dispo > 0)
                            <div class="stock-warning">
                                <span>Seulement {{ $produit->qte_dispo }} restant en stock!</span>
                            </div>
                        @elseif($produit->qte_dispo == 0)
                            <div class="out-of-stock">
                                <span>Currently Out of Stock</span>
                            </div>
                        @endif                </div>
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

                        @if($produit->qte_dispo > 0 )


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
                     @endif
                                 <!-- Affichage du nombre de likes -->
        <div class="likes-info">
                                        <i class="fas fa-heart"></i> {{ $likesCount }}
                                    </div>
                    </div>
     
                    @if($produit->qte_dispo > 0)
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
                    @endif
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
                                    </div>
                                                 <!-- Section pour le like/dislike -->
<div class="mt-4 text-center">
    <p><strong>Coup de cœur ? Cliquez ici !</strong></p>
    @if ($produit->userHasLiked(Auth::id()))
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="fas fa-heart text-danger" style="font-size: 24px;"></i>
            </button>
        </form>
    @else
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="far fa-heart text-success" style="font-size: 24px;"></i>
            </button>
        </form>
    @endif
</div>
                                    <!-- Section des produits similaires -->
                                    <div class="mt-4">
    <div class="row">
        @foreach ($produits->filter(function ($p) use ($produit) { return $p->name == $produit->name && $p->id != $produit->id; }) as $relatedProduct)
       
        @if($relatedProduct->qte_dispo > 0)
        <h5>Autres Couleurs</h5>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('img/' . $relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $relatedProduct->name }} </h6>
                        <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="produit_id" value="{{ $relatedProduct->id }}">
                                                <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                                <button type="submit" class="btn-icon cart-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                    </div>
                </div>
            </div>

        
            @endif
        @endforeach
    </div>
</div>








                                                                    <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('product_like_comments.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="mb-3">
                                        <textarea name="commentaire" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                    </div>
                                    <div class="mb-3">
        <label for="photo" class="form-label">Ajouter une photo</label>
        <input type="file" name="photo" class="form-control" id="photo">
    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
                                </form>




                                        <!-- Section des commentaires et likes -->
                            <div class="col-md-12 mt-4">
                            <h5>Commentaires des Clients</h5>
@foreach ($produit->comments as $comment)
    @if ($comment->commentaire)
        <div class="comment mb-3">
            <p><strong>Client #{{ $comment->client->name }}:</strong> {{ $comment->commentaire }}</p>
            @if ($comment->image)
                <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image"width="100px" class="img-fluid mb-2">
            @endif
            @if ($comment->client_id == Auth::id())
                <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endif
@endforeach

                                


                            </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
            @endif 
        @endforeach
    
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $produits->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>.out-of-stock {
    font-size: 0.9em;
    color: #e74c3c; /* Rouge pour le message "Out of Stock" */
    font-weight: bold;
  
}

.stock-warning {
    font-size: 0.9em;
    color:green; /* Rouge pour le message de stock faible */
    font-weight: bold;
 
}
</style>


</div>
<!-- Sort and Search End -->
 


<style>
.comment {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f929;
}

.product-title {
    font-size: 1.5rem;
    font-weight: bold;
}

.price-info {
    font-size: 1.25rem;
}

.btn-success {
    background-color: #28a745;
}

.btn-danger {
    background-color: #dc3545;
}
</style>


        <div class="nouveaux-produits">
    <div class="container py-5">
        <h2 class="text-center mb-4"> Nouvelle Collection</h2>
        <div id="nouveauxProduitsCarousel" class="carousel slide">
            <div class="carousel-inner">
                @forelse($nouveauxProduits->chunk(4) as $chunk) <!-- Ajustez la taille du chunk selon le nombre d'articles par diapositive -->
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row g-4 justify-content-center">
                            @foreach($chunk as $produit)
                            @php
                                // Remplacez ceci par la logique réelle pour obtenir le nombre de likes
                                $likesCount =  $produit->getLikesCountAttribute($produit->id) 

                            @endphp
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
                                              <!-- Affichage du nombre de likes -->
                                    <div class="likes-info">
                                        <i class="fas fa-heart"></i> {{ $likesCount }}
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
             style="@if($leftImage) background-image: url('#'); background-size: cover; background-position: center; background-repeat: no-repeat; @endif">
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
                            <!-- Section des commentaires et likes -->
                            <div class="col-md-12 mt-4">
                            <h5>Commentaires des Clients</h5>
@foreach ($produit->comments as $comment)
    @if ($comment->commentaire)
        <div class="comment mb-3">
            <p><strong>{{ $comment->client->nom }}:</strong> {{ $comment->commentaire }}</p>
            @if ($comment->image)
                <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image" width="100px"class="img-fluid mb-2">
            @endif
            @if ($comment->client_id == Auth::id())
                <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endif
@endforeach

                                
                                <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('product_like_comments.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="mb-3">
                                        <textarea name="commentaire" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
                                </form>

                                                 <!-- Section pour le like/dislike -->
<div class="mt-4 text-center">
    <p><strong>Coup de cœur ? Cliquez ici !</strong></p>
    @if ($produit->userHasLiked(Auth::id()))
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="fas fa-heart text-danger" style="font-size: 24px;"></i>
            </button>
        </form>
    @else
        <form action="{{ route('product_like_comments.like') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-link p-0 border-0" style="background: none;">
                <i class="far fa-heart text-success" style="font-size: 24px;"></i>
            </button>
        </form>
    @endif
</div>
                                                                    <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('product_like_comments.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="mb-3">
                                        <textarea name="commentaire" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                                    </div>
                                    <div class="mb-3">
        <label for="photo" class="form-label">Ajouter une photo</label>
        <input type="file" name="photo" class="form-control" id="photo">
    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter Commentaire</button>
                                </form>




                                        <!-- Section des commentaires et likes -->
                            <div class="col-md-12 mt-4">
                            <h5>Commentaires des Clients</h5>
@foreach ($produit->comments as $comment)
    @if ($comment->commentaire)
        <div class="comment mb-3">
            <p><strong>Client #{{ $comment->client->name }}:</strong> {{ $comment->commentaire }}</p>
            @if ($comment->image)
                <img src="{{ asset('img/' . $comment->image) }}" alt="Comment Image"width="100px" class="img-fluid mb-2">
            @endif
            @if ($comment->client_id == Auth::id())
                <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endif
@endforeach

                                


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
@include('welcome.layout.footer')
