<style>
    /* Add this to your dashboard.layout.cssperso or a separate CSS file */
.card-body {
    position: relative;
    overflow: hidden; /* Ensures description doesn't overflow */
}

.card-body .description-hidden {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    padding: 10px;
    box-sizing: border-box;
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s ease; /* Smooth transition */
}

.card-body:hover .description-hidden {
    opacity: 1; /* Show on hover */
}

.button-group {
    position: relative;
    z-index: 1; /* Ensure buttons are above the description */
    margin-top: -50px; /* Adjust as needed to position buttons */
}

    /* Styles personnalisés pour les cartes de produits */
.card {
    border: 1px solid #ddd; /* Bordure légère */
    border-radius: 8px; /* Coins arrondis */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Ombre légère */
    transition: box-shadow 0.3s ease; /* Transition douce */
    height: 100%; /* Hauteur 100% pour assurer la même taille */
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0,0,0,0.2); /* Ombre légère au survol */
}

.card-body {
    padding: 20px; /* Marge interne */
}

.card-img-top {
    width: 100%; /* Image occupe toute la largeur */
    height: auto; /* Hauteur automatique */
    border-top-left-radius: 8px; /* Coins arrondis pour l'image */
    border-top-right-radius: 8px;
    object-fit: cover; /* Ajuste l'image pour remplir l'espace */
    max-height: 200px; /* Hauteur maximale de l'image */
}

.image-placeholder {
    height: 200px; /* Hauteur de l'espace réservé */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0; /* Couleur de fond de l'espace réservé */
    color: #999; /* Couleur du texte de l'espace réservé */
    border-top-left-radius: 8px; /* Coins arrondis pour l'espace réservé */
    border-top-right-radius: 8px;
}

.btn-info,
.btn-warning,
.btn-danger {
    margin-right: 10px; /* Marge à droite pour les boutons d'action */
}

    /* Styles personnalisés pour les tableaux */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table .table-active, .table-active > th, .table-active > td {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    /* Styles pour les boutons */
    .btn {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
    }

    .btn-primary {
        background-color: #f5d7dc;
        border-color: #f5d7dc;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #f8bccf;
        border-color: #f8bccf;
        color: #fff;
    }

    .btn-info {
        background-color: #cff4fc;
        border-color: #cff4fc;
        color: #0056b3;
    }

    .btn-info:hover {
        background-color: #b3e0ee;
        border-color: #b3e0ee;
        color: #0056b3;
    }

    .btn-warning {
        background-color: #fff3cd;
        border-color: #fff3cd;
        color: #856404;
    }

    .btn-warning:hover {
        background-color: #ffe08a;
        border-color: #ffe08a;
        color: #856404;
    }

    .btn-danger {
        background-color: #f8d7da;
        border-color: #f8d7da;
        color: #721c24;
    }

    .btn-danger:hover {
        background-color: #f5c6cb;
        border-color: #f5c6cb;
        color: #721c24;
    }

    /* Styles pour les alertes */
    .alert {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

</style>
