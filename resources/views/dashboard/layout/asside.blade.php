<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
<!--1. Sales Analytics Dashboard
Real-time Sales Tracking: Visual charts and graphs displaying sales over time.
Top Products: List of best-selling products.
Customer Insights: Information on customer demographics and purchase behavior.
-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Sales Analytics</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sales-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="sales-overview.html"><i class="bi bi-circle"></i><span>Overview</span></a></li>
                <li><a href="sales-products.html"><i class="bi bi-circle"></i><span>Top Products</span></a></li>
                <li><a href="sales-customers.html"><i class="bi bi-circle"></i><span>Customer Insights</span></a></li>
            </ul>
        </li><!-- End Sales Analytic -->
        <!--2. Inventory Management
Stock Alerts: Notifications for low stock items.
Bulk Update: Options to update stock quantities and product details in bulk.
Supplier Management: Track supplier details and order history.-->

        <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-archive"></i><span>Gestion de l'Inventaire</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="inventory-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    <li class="{{ Request::is('index') ? 'active' : '' }}">
    <a href="{{ route('produits.index') }}">
        <i class="bi bi-circle"></i><span>liste produits</span>
    </a>
</li>
        <li>
            <a href="{{ route('produits.create') }}">
                <i class="bi bi-circle"></i><span>update stock</span>
            </a>
        </li>
        <li>
            <a href="supplier-management">
                <i class="bi bi-circle"></i><span>Gestion des ressources</span>
            </a>
        </li>
    </ul>
</li><!-- End Inventory Management Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart-check"></i><span>Gestion des Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="order-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="order-tracking.html">
                        <i class="bi bi-circle"></i><span>Suivi des Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="order-invoicing.html">
                        <i class="bi bi-circle"></i><span>Facturation Automatisée</span>
                    </a>
                </li>
                <li>
                    <a href="order-customer-communication.html">
                        <i class="bi bi-circle"></i><span>Communication Client</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Order Management Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#crm-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Gestion de la Relation Client (CRM)</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="crm-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li class="{{ Request::is('index') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}">
        <i class="bi bi-circle"></i><span>Profils Clients / liste des clients actives</span>
    </a>
</li>
<li>
    <a href="{{ route('clients.create') }}">
        <i class="bi bi-circle"></i><span>Ajout Client</span>
    </a>
</li>

                <li>
                    <a href="crm-customer-profiles.html">
                        <i class="bi bi-circle"></i><span>Profils Clients/liste des clients non active</span>
                    </a>
                </li>
                <li>
                    <a href="crm-loyalty-program.html">
                        <i class="bi bi-circle"></i><span>Gestion du Programme de Fidélité</span>
                    </a>
                </li>
                <li>
                    <a href="crm-feedback-system.html">
                        <i class="bi bi-circle"></i><span>Système de Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="crm-discount-codes.html">
                        <i class="bi bi-circle"></i><span>Codes de Réduction</span>
                    </a>
                </li>
            </ul>
        </li><!-- End CRM Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle"></div>