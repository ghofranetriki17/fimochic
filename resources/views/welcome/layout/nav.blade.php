<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Sfax, Tunisa</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">fimochic@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-rose-poudre navbar-expand-xl">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="text-bleu-doux display-6 text-pink">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo Fimo Chic" style="max-width: 40px;"> Fimo Chic
                </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-bleu-doux"></span>
            </button>
            <div class="collapse navbar-collapse bg-rose-poudre" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link active text-bleu-doux">Accueil</a>
                    <a href="{{ route('boutique.index') }}" class="text-rose nav-item nav-link text-bleu-doux">Boutique</a>
                    <a href="about.html" class="text-rose nav-item nav-link text-bleu-doux">À Propos</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="text-rose nav-link dropdown-toggle text-bleu-doux" data-bs-toggle="dropdown">Personnalisation</a>
                        <div class="dropdown-menu m-0 bg-jaune-pale rounded-0">
                        <a href="{{ route('personnalisation.boucles') }}" class="text-rose dropdown-item">Personnaliser Boucles</a>
                        <a href="{{ route('personnalisation.cadeau')}}" class="text-rose dropdown-item">Personnaliser Cadeaux</a>
                            <a href="gifts-personalization.html" class="text-rose dropdown-item">vos creations</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="text-rose nav-link dropdown-toggle text-bleu-doux" data-bs-toggle="dropdown">Explorez</a>
                        <div class="dropdown-menu m-0 bg-jaune-pale rounded-0">
                            <a href="{{ route('panier.index') }}" class="text-rose dropdown-item">Mon Panier</a>
                            <a href="checkout.html" class="text-rose dropdown-item">Passer Commande</a>
                            <a href="testimonials.html" class="text-rose dropdown-item">Avis Clients</a>
                            <a href="404.html" class="text-rose dropdown-item">Page Non Trouvée</a>
                            <a href="tutorials.html" class=" text-rose dropdown-item">Voir Tutoriels</a> <!-- Ajout du lien vers la page des tutoriels -->
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link text-bleu-doux text-rose">Contact</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-bleu-doux btn-md-square rounded-circle bg-blanc me-4" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search text-bleu-doux"></i>
                    </button>
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
<style></style>
