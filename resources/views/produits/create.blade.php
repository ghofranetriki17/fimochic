<!-- resources/views/produits/create.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<style>
    .return-btn {
    background-color: #f48fb1; /* Pink background */
    color: #fff;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    display: inline-block;
    margin-bottom: 20px;
    text-decoration: none; /* Remove underline from the link */
}

.return-btn:hover {
    background-color: #ec407a; /* Darker pink on hover */
}

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fce4ec; /* Light pink background */
        color: #555;
        margin: 0;
        padding: 0;
    }

   



    .breadcrumb a {
        color: #fff;
        text-decoration: none;
    }

    .section {
        padding: 20px 0;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        margin-bottom: 8px;
        color: #ad1457; /* Dark pink for labels */
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
        padding: 12px;
        font-size: 15px;
        border: 2px solid #f48fb1; /* Light pink border */
        border-radius: 8px;
        width: 100%;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus, 
    .form-group select:focus, 
    .form-group textarea:focus {
        border-color: #e91e63; /* Bright pink focus */
        outline: none;
        box-shadow: 0 0 6px rgba(233, 30, 99, 0.3);
    }

    .form-group input[type="file"] {
        padding: 6px;
    }

    .submit-btn {
        background-color: #e91e63; /* Bright pink button */
        color: #fff;
        border: none;
        padding: 14px 24px;
        font-size: 16px;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        align-self: center;
    }

    .submit-btn:hover {
        background-color: #d81b60; /* Slightly darker pink on hover */
    }
</style>
<div class="pagetitle">
    <h1>Créer un Produit</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
            <li class="breadcrumb-item">Gestion des Produits</li>
            <li class="breadcrumb-item active">Créer un Produit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="form-container">
        <h2>Formulaire de Création de Produit</h2>

        <!-- Form for creating a new product -->
        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Champ pour télécharger une photo -->
            <div class="form-group">
                <label for="photo">Photo du Produit</label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="name">Nom du Produit</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix">
            </div>
            <div class="form-group">
                <label for="qte_dispo">Quantité Disponible</label>
                <input type="number" id="qte_dispo" name="qte_dispo">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type">
            </div>
            <div class="form-group">
                <label for="date_ajout">Date d'Ajout</label>
                <input type="date" id="date_ajout" name="date_ajout">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3"></textarea>
            </div>

            <!-- Sélection des attributs et valeurs -->
            @foreach ($attributs as $attribut)
                <div class="form-group">
                    <label for="attribut_{{ $attribut->id }}">{{ $attribut->nom }}</label>
                    <select id="attribut_{{ $attribut->id }}" name="attribute_values[{{ $attribut->id }}][]" multiple>
                        @foreach ($attribut->valeurs as $valeur)
                            <option value="{{ $valeur->id }}">{{ $valeur->nom }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <a href="{{ route('produits.index') }}" class="return-btn">Retour à la Liste des Produits</a>

            <button type="submit" class="submit-btn">Créer</button>
        </form>
        <!-- End Form for creating a new product -->
    </div>
</section>
@include('dashboard.layout.footer')
