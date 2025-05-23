<!-- Navbar start -->
<div class="container-fluid fixed-top">
<style>
   .topbar {
    background-color: #b4e1f9 !important;
}
    .top-info small {
        color: #ffffff !important; /* Changer la couleur du texte */
    }
    .text-whitee {
    color: #ffffff;}
    .text-secondaryy {
    color: #ffffff;
}
    .top-link a {
        color: #ffffff !important; /* Changer la couleur des liens */
    }

    .top-link a:hover {
        color: #ffd700 !important; /* Couleur des liens au survol */
    }
</style>

<div class="container topbar bg-primary d-none d-lg-block">
    <div class="d-flex justify-content-between">
        <div class="top-info ps-2">
            <!-- Adresse -->
            <small class="me-3">
                <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                <a href="#" class="text-white">{{ $parametres['adresse'] ?? 'Sfax, Tunisia' }}</a>
            </small>
                 <!-- Adresse -->
                 <small class="me-3">
                <i class="fas fa-phone-alt me-2 text-secondary"></i>
                <a href="#" class="text-white">{{ $parametres['numero tel'] ?? '' }}</a>
            </small>
            <!-- Email -->
            <small class="me-3">
                <i class="fas fa-envelope me-2 text-secondary"></i>
                <a href="mailto:{{ $parametres['email'] ?? 'ghofrane.triki.17@gmail.com' }}" class="text-white">{{ $parametres['email'] ?? 'ghofrane.triki.17@gmail.com' }}</a>
            </small>
        </div>
        <div class="top-link pe-2">
            <!-- Liens vers les pages légales -->
            <a href="{{ $parametres['privacy_policy'] ?? '#' }}" class="text-white">
                <small class="text-white mx-2">Privacy Policy</small>/
            </a>
            <a href="{{ $parametres['terms_of_use'] ?? '#' }}" class="text-white">
                <small class="text-white mx-2">Terms of Use</small>/
            </a>
            <a href="{{ $parametres['sales_and_refunds'] ?? '#' }}" class="text-white">
                <small class="text-white ms-2">Sales and Refunds</small>
            </a>
        </div>
    </div>
</div>

    <div class="container px-0">
        <nav class="navbar navbar-light bg-rose-poudre navbar-expand-xl">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="text-bleu-doux display-6 text-pink">
                <img src="{{ asset($parametres['logo'] ?? 'img/logo.jpg') }}" alt="Logo Fimo Chic" style="max-width: 45px;"> Fimo Chic
                </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-bleu-doux"></span>
            </button>
            <div class="collapse navbar-collapse bg-rose-poudre" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }} text-bleu-doux">Accueil</a>
                    <a href="{{ route('boutique.index') }}" class="nav-item nav-link {{ request()->routeIs('boutique.index') ? 'active' : '' }} text-bleu-doux">Boutique</a>
                    <a href="{{ route('apropos') }}" class="nav-item nav-link {{ request()->routeIs('apropos') ? 'active' : '' }} text-bleu-doux">À Propos</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('personnalisation.*') ? 'active' : '' }} text-bleu-doux" data-bs-toggle="dropdown">Personnalisation</a>
                        <div class="dropdown-menu m-0 bg-jaune-pale rounded-0">
                            <a href="{{ route('personnalisation.boucles') }}" class="dropdown-item {{ request()->routeIs('personnalisation.boucles') ? 'active' : '' }} text-rose">Personnaliser Boucles</a>
                            <a href="{{ route('personnalisation.cadeau') }}" class="dropdown-item {{ request()->routeIs('personnalisation.cadeau') ? 'active' : '' }} text-rose">Personnaliser Cadeaux</a>
                            <a href="{{ route('creations.index') }}" class="dropdown-item {{ request()->routeIs('creations.index') ? 'active' : '' }} text-rose">Vos créations</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('panier.index') || request()->routeIs('checkout') || request()->routeIs('testimonials') || request()->routeIs('404') || request()->routeIs('tutorials') ? 'active' : '' }} text-bleu-doux" data-bs-toggle="dropdown">Explorez</a>
                        <div class="dropdown-menu m-0 bg-jaune-pale rounded-0">

<!--                            <a href="tutorials.html" class="dropdown-item {{ request()->routeIs('tutorials') ? 'active' : '' }} text-rose">Voir Tutoriels</a>
-->
<a href="{{ route('faq.index') }}" class="dropdown-item {{ request()->routeIs('faq') ? 'active' : '' }} text-rose">faq</a>

                        </div>

                    </div>
                    <a href="{{ route('contact.create') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }} text-bleu-doux text-rose">Contact</a>
                </div>
                <div class="d-flex m-3 me-0">
                <form method="GET" action="{{ route('boutique.index') }}" class="w-100 mx-auto d-flex">
    <div class="input-group w-100" style="max-width: 200px; height:10px;margin: 0 auto;">
        <input 
            type="search" 
            name="search" 
            class="form-control p-2" 
            style="border-radius: 20px; padding-left: 0.5rem; font-size: 0.8rem;" 
            placeholder="Rechercher des produits..." 
            aria-describedby="search-icon-1" 
            value="{{ request()->input('search') }}"
        >
        <span id="search-icon-1" class="input-group-text" style="border-radius: 20px; padding: 0.5rem; background-color: transparent; border: none;">
            <button type="submit" class="btn btn-link p-0" style="font-size: 1rem; color: #c4089;">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

                    
                    <a href="{{ route('panier.index') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x text-bleu-doux"></i>
                    </a>
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check())
                            <li class="nav-item">
                                <a href="{{ route('clients.compte') }}" class="my-auto">
                                    <i class="fas fa-user fa-2x text-bleu-doux"></i>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="my-auto">
                                    <i class="fas fa-user fa-2x text-bleu-doux"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
