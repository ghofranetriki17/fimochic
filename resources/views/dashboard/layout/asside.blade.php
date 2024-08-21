<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a  href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
      

  <!-- Gestion de l'Inventaire -->
  <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-archive"></i>
                <span>Gestion de l'Inventaire</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inventory-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="{{ Request::is('produits') ? 'active' : '' }}">
                    <a href="{{ route('produits.index') }}">
                        <i class="bi bi-circle"></i><span>Liste des Produits</span>
                    </a>
                </li>
                <li class="{{ Request::is('produits/create') ? 'active' : '' }}">
                    <a href="{{ route('produits.create') }}">
                        <i class="bi bi-circle"></i><span>Mettre à Jour le Stock</span>
                    </a>
                </li>
                <li class="{{ Request::is('galleries/create') ? 'active' : '' }}">
                    <a href="{{ route('galleries.create') }}">
                        <i class="bi bi-circle"></i><span>Mettre à Jour la Galerie</span>
                    </a>
                </li>
                <li class="{{ Request::is('attributs') ? 'active' : '' }}">
                    <a href="{{ route('attributs.index') }}">
                        <i class="bi bi-circle"></i><span>Gérer les Catégories (Attributs)</span>
                    </a>
                </li>
                <li class="{{ Request::is('valeurs') ? 'active' : '' }}">
                    <a href="{{ route('valeurs.index') }}">
                        <i class="bi bi-circle"></i><span>Gérer les Sous-Catégories (Valeurs)</span>
                    </a>
                </li>
                <li class="{{ Request::is('ressources') ? 'active' : '' }}">
                    <a href="{{ route('ressources.index') }}">
                        <i class="bi bi-circle"></i><span>Gérer des Ressources</span>
                    </a>
                </li>
            </ul>
        </li>





  <!-- Gestion des Commandes -->
  <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart-check"></i>
                <span>Gestion des Commandes</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="order-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="{{ Request::is('commandes') ? 'active' : '' }}">
                    <a href="{{ route('commandes.index') }}">
                        <i class="bi bi-circle"></i><span>Suivi des Commandes</span>
                    </a>
                </li>
                <li class="{{ Request::is('ressources_personnalisation') ? 'active' : '' }}">
                    <a href="{{ route('ressources_personnalisation.index') }}">
                        <i class="bi bi-circle"></i><span>Options de Personnalisation des Commandes</span>
                    </a>
                </li>
                <li class="{{ Request::is('personnalisation') ? 'active' : '' }}">
                    <a href="{{ route('personnalisation.index') }}">
                        <i class="bi bi-circle"></i><span>Commandes Personnalisées en Attentes</span>
                    </a>
                </li>
                <li class="{{ Request::is('commandespersoonalisse') ? 'active' : '' }}">
                    <a href="{{ route('commandespersoonalisse.index') }}">
                        <i class="bi bi-circle"></i><span>Commandes Personnalisées Confirmées</span>
                    </a>
                </li>
                <li>
                    <a href="order-customer-communication.html">
                        <i class="bi bi-circle"></i><span>Livraison</span>
                    </a>
                </li>
            </ul>
        </li>



     
       



        <!-- Gestion de la Relation Client (CRM) -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#crm-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i>
                <span>Gestion de la Relation Client (CRM)</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="crm-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="{{ Request::is('clients') ? 'active' : '' }}">
                    <a href="{{ route('clients.index') }}">
                        <i class="bi bi-circle"></i><span>Liste des Clients</span>
                    </a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact.index') }}">
                        <i class="bi bi-circle"></i><span>Messages des Clients</span>
                    </a>
                </li>
                <li class="{{ Request::is('clients/create') ? 'active' : '' }}">
                    <a href="{{ route('clients.create') }}">
                        <i class="bi bi-circle"></i><span>Ajout Client</span>
                    </a>
                </li>
                <li>
                    <a href="crm-loyalty-program.html">
                        <i class="bi bi-circle"></i><span>Gestion du Programme de Fidélité</span>
                    </a>
                </li>
                <li class="{{ Request::is('product_like_comments') ? 'active' : '' }}">
                    <a href="{{ route('product_like_comments.index') }}">
                        <i class="bi bi-circle"></i><span>Système de Feedback</span>
                    </a>
                </li>
            </ul>
        </li>
      <!-- Gestion des Promotions -->
      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#promo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tags"></i>
                <span>Gestion des Promotions</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="promo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="{{ Request::is('promotions') ? 'active' : '' }}">
                    <a href="{{ route('promotions.index') }}">
                        <i class="bi bi-circle"></i><span>Gérer les Promotions</span>
                    </a>
                </li>
                <li class="{{ Request::is('promo_codes') ? 'active' : '' }}">
                    <a href="{{ route('promo_codes.index') }}">
                        <i class="bi bi-circle"></i><span>Gérer les Codes Promo</span>
                    </a>
                </li>
            </ul>
        </li>


       




 <!-- Images d'Inspiration -->
 <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#inspo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-images"></i>
                <span>Images d'Inspiration</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inspo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="inspo-upload.html">
                        <i class="bi bi-circle"></i><span>Télécharger des Images</span>
                    </a>
                </li>
                <li>
                    <a href="inspo-manage.html">
                        <i class="bi bi-circle"></i><span>Gérer les Images</span>
                    </a>
                </li>
            </ul>
        </li>



         <!-- Vidéos Tutoriels -->
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tutorials-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-play-circle"></i>
                <span>Vidéos Tutoriels</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tutorials-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tutorials-upload.html">
                        <i class="bi bi-circle"></i><span>Télécharger des Vidéos</span>
                    </a>
                </li>
                <li>
                    <a href="tutorials-manage.html">
                        <i class="bi bi-circle"></i><span>Gérer les Vidéos</span>
                    </a>
                </li>
            </ul>
        </li>




        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('faq.manage') }}" >
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

       
    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle"></div>