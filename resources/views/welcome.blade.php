@include('welcome.layout.head')
@include('welcome.layout.nav')

<style>
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
    
}.product-card .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 60%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.3s ease;

}

.product-images {
    display: flex;
    justify-content: center;
    align-items: center;
}
.owl-carousel .owl-item {
    height: 500px;}
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

.btn-icon:hover {
    background-color: #fff; /* Fond blanc au survol */
    color: #ffb3c1; /* Couleur des icônes au survol */
}
.cart-icon {
    margin-right: 10px; /* Espacement entre les boutons */
}

/* Style spécifique pour le bouton de vue du produit */
.eye-icon {
    margin-left: 10px; /* Espacement entre les boutons */
}

</style>


<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header position-relative">
    <video autoplay loop muted class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;">
        <source src="/img/hero.mp4" type="video/mp4">
        Votre navigateur ne prend pas en charge la vidéo.
    </video>
    <div class="container py-5 position-relative">
        <div class="row g-5 align-items-center justify-content-center text-center">
            <div class="col-md-12">
                <h2 class="mb-5 display-3 text-white">Bienvenue sur </h2>
                <h1 class="mb-5 display-3 text-pink">Fimo Chic</h1>

                <h4 class="b-3 text-white">Façonné avec Amour, Porté avec Joie</h4>
                <h4 class="mb-3 text-green">100% Handmade</h4>

                <a href="#" class="btn btn-pink rounded-pill px-4 py-2">Acheter Maintenant</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero End -->






<!-- Palette de Plaisirs start -->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1 class="title b">Palette de Plaisirs</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        @foreach($groupedProducts as $valeurName => $produits)
                            <li class="nav-item">
                                <a class="nav-link d-flex m-2 py-2 rounded-pill {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ Str::slug($valeurName) }}">
                                    <span class="b" style="width: 130px;">{{ $valeurName }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <button class="nav-btn" id="prev"></button>
                <button class="nav-btn" id="next"></button>
                <br>
                @foreach($groupedProducts as $valeurName => $produits)
                    <div id="tab-{{ Str::slug($valeurName) }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}">
                        <div class="product-navigation">
                            <div class="product-container">
                                @foreach($produits as $produit)
                                @php
                                // Remplacez ceci par la logique réelle pour obtenir le nombre de likes
                                $likesCount =  $produit->getLikesCountAttribute($produit->id) 

                            @endphp
                                    @php
                                                    $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();

                                        $promotion = $produit->promotions->first();
                                        $qrCodeImage = $galleries->where('produit_id', $produit->id)->where('type', 'qr')->first();
                                    @endphp
                               <div class="col-md-6 col-lg-3">
                                        <div class="product-card">
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                            {{ $valeurName }}
                                        </div>                                            <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}" class="main-product-image">
                                            @if($galleryHover)
                                                <img src="{{ asset('img/' . $galleryHover->image) }}" class="hover-image" alt="{{ $produit->name }} Hover">
                                            @endif

                                            <div class="card-body">
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
                                                  <!-- Affichage du nombre de likes -->
                                    <div class="likes-info">
                                        <i class="fas fa-heart"></i> {{ $likesCount }}
                                    </div>
                                            </div>

                                            <div class="icon-container">
                                                <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                    <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                                    <button type="submit" class="btn-icon cart-icon">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </button>
                                                </form>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End -->


<!-- Fruits Shop End -->

<!-- Features Start -->
<!-- Features Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3">
                <a href="boutique.html">
                    <div class="service-item bg-secondaryyy rounded border border-secondary">
                        <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">30% sur le premier achat</h5>
                                <h3 class="mb-0">Découvrez la boutique</h3>
                                <p>Profitez de notre offre spéciale !</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="personnalisation.html">
                    <div class="service-item bg-dark rounded border border-dark">
                        <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Paquets Cadeaux Personnalisés</h5>
                                <h3 class="mb-0">Pour chaque occasion</h3>
                                <p>Choisissez le thème parfait !</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="personnalisation-boucles.html">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="img/featur-3.jpeg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Personnalisation des Boucles</h5>
                                <h3 class="mb-0">À votre goût</h3>
                                <p>Créez des boucles uniques et Participez au marathon créatif : le design le plus aimé remporte des surprises </p>






</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="tirage-au-sort.html">
                    <div class="service-item bg-secondaryy rounded border border-secondary">
                        <img src="img/featur-4.jpg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Gagnez des Boucles</h5>
                                <h3 class="mb-0">Tirage au sort mensuel</h3>
                                <p>Achetez à partir de 40 DT pour participer !</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


<!-- Section Best Sellers -->
<div class="container py-5">
    <h1>Meilleures Ventes</h1>
    <div class="product-navigation">
        <button class="nav-btn" id="prev"></button>
        <button class="nav-btn" id="next"></button>

        <div class="product-container">
            <div class="d-flex"> <!-- Utiliser flexbox pour tous les produits sur la même ligne -->
            @foreach($bestSellers as $produit)
            @php
                                // Remplacez ceci par la logique réelle pour obtenir le nombre de likes
                                $likesCount =  $produit->getLikesCountAttribute($produit->id) 

                            @endphp
                @php
                    $galleryHover = $galleries->where('produit_id', $produit->id)->where('type', 'hover')->first();
                    $qrCodeImage = $galleries->where('produit_id', $produit->id)->where('type', 'qr')->first();
                    $promotion = $produit->promotions->first();
                @endphp
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-card">
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                           best seller
                                        </div>                          <img src="{{ asset('img/' . $produit->image) }}" alt="{{ $produit->name }}" class="main-product-image">
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
            @endforeach
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('next').onclick = function() {
    document.querySelector('.product-container').scrollBy({ left: 300, behavior: 'smooth' });
};
document.getElementById('prev').onclick = function() {
    document.querySelector('.product-container').scrollBy({ left: -300, behavior: 'smooth' });
};
</script>

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
    margin-left:30px;

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
    color: #46bbd5 !important;
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
.product-container {
    width: 1200px;}
   
.product-navigation {
  
    margin-right: 30px;}
</style>


   <!-- Banner Section Start -->
   <div class="container-fluid banner bg-lightblue my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <!-- Text Section -->
            <div class="col-lg-6">
                <div class="py-4 text-center text-lg-start">
                    <h1 class="display-3 text-pink">Testez Avant d'Acheter !</h1>
                    <p class="fw-normal text-pink mb-4">Scannez le QR code pour essayer nos produits en réalité augmentée et participez à notre concours pour gagner des cadeaux exclusifs.</p>
                    <p class="text-pink mb-4">Partagez votre look avec #FimoChicTest pour tenter de gagner des prix !</p>
                    <a href="#" class="banner-btn btn border-2 border-pink rounded-pill text-pink py-3 px-5">Scannez le QR Code</a>
                </div>
            </div>
            <!-- QR Code Section -->
            <div class="col-lg-6 text-center">
                <div class="position-relative">
                    <img src="img/qrfimo.png" class="img-fluid rounded" alt="QR Code">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->
<!-- Section Porte-Clés -->
<div class="container py-5">
    <h1>Porte-Clés</h1>
    <div class="product-navigation">
        <button class="nav-btn" id="prevKeychains"></button>
        <button class="nav-btn" id="nextKeychains"></button>

        <div class="product-container">
            <div class="d-flex "> <!-- Utiliser flexbox pour tous les produits sur la même ligne -->
                @foreach($keychains as $porteClef)
                    @php
                        $galleryHover = $galleries->where('produit_id', $porteClef->id)->where('type', 'hover')->first();
                        $qrCodeImage = $galleries->where('produit_id', $porteClef->id)->where('type', 'qr')->first();
                        $promotion = $porteClef->promotions->first();
                    @endphp
                    <div class="col-md-6 col-lg-3 ">
                        <div class="product-card">
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                        Porte-clé
                                        </div>                              <img src="{{ asset('img/' . $porteClef->image) }}" alt="{{ $porteClef->name }}" class="main-product-image">
                            @if($galleryHover)
                                <img src="{{ asset('img/' . $galleryHover->image) }}" class="hover-image" alt="{{ $porteClef->name }} Hover">
                            @endif
                            <div class="card-body">
                                <!-- Icône QR Code et lien vers la modale -->
                                @if($qrCodeImage)
                                    <a href="#" class="btn-icon qr-icon" data-bs-toggle="modal" data-bs-target="#qrModal{{ $porteClef->id }}">
                                        <i class="fas fa-qrcode"></i>
                                    </a>
                                @endif
                                <h4>{{ $porteClef->name }}</h4>
                                <div class="d-flex justify-content-between">
                                    @if($promotion)
                                        <p class="text-dark fs-5 fw-bold mb-0">
                                            <span class="text-decoration-line-through">{{ $porteClef->prix }} DT</span>
                                            <span class="text-danger ms-2">{{ $promotion->new_price }} DT</span>
                                        </p>
                                    @else
                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $porteClef->prix }} DT</p>
                                    @endif
                                </div>
                            </div>
                            <!-- Container des icônes -->
                            <div class="icon-container">
                                <!-- Formulaire d'ajout au panier -->
                                <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $porteClef->id }}">
                                    <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                    <button type="submit" class="btn-icon cart-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                                <!-- Lien vers la fenêtre modal -->
                                <button type="button" class="btn-icon eye-icon" data-bs-toggle="modal" data-bs-target="#keychainModal{{ $porteClef->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modale QR Code -->
                    @if($qrCodeImage)
                        <div class="modal fade" id="qrModal{{ $porteClef->id }}" tabindex="-1" aria-labelledby="qrModalLabel{{ $porteClef->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="qrModalLabel{{ $porteClef->id }}">Code QR pour {{ $porteClef->name }}</h5>
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
                    <div class="modal fade" id="keychainModal{{ $porteClef->id }}" tabindex="-1" aria-labelledby="keychainModalLabel{{ $porteClef->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content product-modal-background-{{ $porteClef->id }}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="keychainModalLabel{{ $porteClef->id }}">Détails du Produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="product-details">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-images d-flex justify-content-center align-items-center">
                                                    <div class="left-images">
                                                        @foreach ($porteClef->galleries as $gallery)
                                                            @if ($gallery->type == 'L')
                                                                <img src="{{ asset('img/' . $gallery->image) }}" alt="Image L" class="img-fluid">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- Carrousel d'images -->
                                                    <div id="carousel{{ $porteClef->id }}" class="carousel slide mx-0">
                                                        <div class="carousel-inner">
                                                            <!-- Image principale -->
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('img/' . $porteClef->image) }}" alt="Image du produit" class="d-block w-100">
                                                            </div>
                                                            <!-- Images de type "autre" -->
                                                            @foreach ($porteClef->galleries->where('type', 'autre') as $image)
                                                                <div class="carousel-item">
                                                                    <img src="{{ asset('img/' . $image->image) }}" alt="Image autre" class="d-block w-100">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $porteClef->id }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $porteClef->id }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    <div class="right-images">
                                                        @foreach ($porteClef->galleries as $gallery)
                                                            @if ($gallery->type == 'R')
                                                                <img src="{{ asset('img/' . $gallery->image) }}" alt="Image R" class="img-fluid">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <h4>{{ $porteClef->name }}</h4>
                                                <p class="text-muted">{{ $porteClef->categorie }}</p>
                                                <p>{{ $porteClef->description }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        @if($porteClef->promotions->isNotEmpty())
                                                            <span class="text-decoration-line-through">{{ $porteClef->prix }} DT</span>
                                                            <span class="text-danger ms-2">{{ $porteClef->promotions->first()->new_price }} DT</span>
                                                        @else
                                                            {{ $porteClef->prix }} DT
                                                        @endif
                                                    </p>
                                                    <form action="{{ route('panier.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="produit_id" value="{{ $porteClef->id }}">
                                                        <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                                        <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Ajouter au panier
                                                        </button>
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
</div>
<!-- Fin Section Porte-Clés -->


<script>
document.getElementById('nextKeychains').onclick = function() {
    document.querySelector('.product-container').scrollBy({ left: 300, behavior: 'smooth' });
};
document.getElementById('prevKeychains').onclick = function() {
    document.querySelector('.product-container').scrollBy({ left: -300, behavior: 'smooth' });
};
</script>


<!-- Features End -->


 <!-- Section Produits en Promotion  <div class="container py-5">
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





                                    <form action="{{ route('panier.store') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                            <input type="hidden" name="quantite" value="1" min="1" class="quantity-input">
                                            <button type="submit" class="btn-icon cart-icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </form>



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
</div>-->


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






  <!-- Featurs Section Start -->
  <div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-fcbff8 p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-b9fac3 mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5 class="text-b9bbfa">Livraison Gratuite</h5>
                        <p class="mb-0">Gratuite sur les commandes de plus de 300 DT</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-fcbff8 p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-b9fac3 mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5 class="text-b9bbfa">Paiement Sécurisé</h5>
                        <p class="mb-0">100% de sécurité lors du paiement</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-fcbff8 p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-b9fac3 mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5 class="text-b9bbfa">Retour de 30 Jours</h5>
                        <p class="mb-0">Garantie de remboursement de 30 jours</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-fcbff8 p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-b9fac3 mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5 class="text-b9bbfa">Support 24/7</h5>
                        <p class="mb-0">Support rapide à tout moment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->


    <!-- Bestsaler Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">vos creations les plus aimees</h1>
                <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which
                    looks reasonable.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-1.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-2.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-3.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-5.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-6.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-1.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-2.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-3.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-4.jpg" class="img-fluid rounded" alt="">
                        <div class="py-2">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bestsaler Product End -->


    <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


   <!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">Nos Témoignages</h4>
            <h1 class="display-5 mb-5 text-dark">Ce Que Nos Clients Disent !</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            @foreach ($comments as $comment)
                @if ($comment->commentaire)
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <h3 class="text-dark">{{ $comment->client->nom }} {{ $comment->client->preNom }}</h3>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                @if ($comment->image)
                                    <div class="bg-secondary rounded">
                                    <img src="{{ asset('img/' . $comment->image) }}" class="img-fluidd rounded" style="width: 150px; height: 100px; object-fit: cover;" alt="Client Image">
                                    </div>
                                @endif
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">{{ $comment->produit->name }}</h4> <!-- Assuming the produit model has a 'name' attribute -->
                                    <h6 class="m-0 pb-3">{{ $comment->commentaire }}</h6>
                                    <div class="d-flex pe-5">
                                        <!-- Affichage du nombre de likes -->
                                        <div class="likes-info">
                                            <i class="fas fa-heart text-primary"></i> {{ $comment->produit->likes_count }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if($comments->isEmpty())
                <p class="text-center">Aucun témoignage pour le moment.</p>
            @endif
        </div>
    </div>
</div>
<!-- Tastimonial End -->
<style>.img-fluidd {
    max-width: 100px;
    height: auto;
}

<style>.testimonial-item {
    background-color: #97ffcc69 !important;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgb(114 222 127);
    padding: 20px !important;
    margin: 10px;
    position: relative;
    width: fit-content;
    height: 300px !important;
    margin-right: 0px;
    margin-left: 0px !important;
}</style>

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
    background-color: #cffcda00;
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


    @include('welcome.layout.footer')
