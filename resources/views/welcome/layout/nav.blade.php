<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-rose-poudre navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-bleu-doux display-6 text-pink">
                    <img src="img/logo.jpg" alt="Logo Fimo Chic" style="max-width: 40px;"> Fimo Chic
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
                            <a href="earrings-personalization.html" class="text-rose dropdown-item">Personnaliser Boucles</a>
                            <a href="gifts-personalization.html" class="text-rose dropdown-item">Personnaliser Cadeaux</a>
                            <a href="gifts-personalization.html" class="text-rose dropdown-item">vos creations</a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="text-rose nav-link dropdown-toggle text-bleu-doux" data-bs-toggle="dropdown">Explorez</a>
                        <div class="dropdown-menu m-0 bg-jaune-pale rounded-0">
                            <a href="cart.html" class="text-rose dropdown-item">Mon Panier</a>
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
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x text-bleu-doux"></i>
                        <span class="position-absolute bg-vert-menthe rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    <a href="#" class="my-auto">
                        <i class="fas fa-user fa-2x text-bleu-doux"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
<style></style>