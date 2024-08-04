@include('welcome.layout.head')
@include('welcome.layout.nav')

<style>
#preview {
    position: relative;
    width: 400px;
    height: 400px;
    background-color: transparent;
    margin: 20px auto; /* Center horizontally with margin auto */
    padding: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease; /* Smooth transition for the zoom effect */
}

#preview:hover {
    transform: scale(2); /* Zoom in by 10% */
}

.preview-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    pointer-events: none;
    border-radius: 10px;
}


    .option img {
        max-width: 100px;
        max-height: 100px;
        cursor: pointer;
    }

    .option-buttons {
        margin-top: 10px;
    }

    .custom-form-group {
        margin-bottom: 20px;
    }

    .custom-option-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        
    }

    .custom-option {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        width: 140px;
                height: 270px;

        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .custom-option img {
        max-width: 100px;
        max-height: 100px;
    }

    .custom-option span {
        display: block;
        margin-top: 10px;
    }
    .btn-toggle-preview {
    background-color: #cfe2ff; /* Couleur de fond douce pour le bouton */
    border: none;
    color: #333;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em;
    transition: background-color 0.3s ease, color 0.3s ease; /* Effet de transition pour les changements de couleur */
}

.btn-toggle-preview:hover {
    background-color: #adcde6; /* Couleur de fond au survol */
    color: #fff; /* Couleur du texte au survol */
}

.btn-toggle-preview.active {
    background-color: #d1e7dd; /* Couleur de fond lorsque le bouton est actif */
    color: #333; /* Couleur du texte lorsque le bouton est actif */
}


    .btn-primary  {
        background-color: #d1e7dd; /* Soft Green */
        border-color: #d1e7dd;
        color: #0101b8;
    }

    .btn-primary:hover {
        background-color: #bcd0c7; /* Darker Green */
        border-color: #bcd0c7;
    }

    .btn-success {
        background-color: #cfe2ff; /* Soft Blue */
        border-color: #cfe2ff;
        color: #333;
    }

    .btn-success:hover {
        background-color: #adcde6; /* Darker Blue */
        border-color: #adcde6;
    }

    .btn-danger {
        background-color: #f8d7da; /* Soft Red */
        border-color: #f8d7da;
        color: #333;
    }

    .btn-danger:hover {
        background-color: #e6b3b8; /* Darker Red */
        border-color: #e6b3b8;
    }

    /* New styles for the summary section */
    #summary {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    #summary h2 {
        margin-bottom: 20px;
    }

    #summary-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }
h2{color:#205681;}
    #summary-list li {
        margin-bottom: 10px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
#m{margin-top: 150px;}
    #total-price {
        font-weight: bold;
        font-size: 1.2em;
    }
</style>

<div class="container" id="m">
    <form action="{{ route('personnalisation.store') }}" method="POST" id="personnalisation-form">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="custom-form-group">
                    <h2>Aperçu</h2>
                    <div id="preview" class="text-center">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer la personnalisation</button>
            </div>
            <div class="col-md-6">
            <h2>Choisissez vos options</h2>
        <div id="type-buttons" class="mb-4">
            @foreach($ressourcesParType as $type => $ressources)
                <button type="button" class="btn btn-primary type-button" data-type="{{ $type }}">{{ ucfirst($type) }}</button>
            @endforeach
        </div>

        <div id="options-container">
            @foreach($ressourcesParType as $type => $ressources)
                <div class="custom-form-group options-group" id="{{ $type }}-options" style="display: none;">
                    <label for="{{ $type }}">{{ ucfirst($type) }}</label>
                    <div class="custom-option-group" >
                        @foreach($ressources as $ressource)
                            <div class="custom-option">
                                <img src="{{ asset('img/'.$ressource->image) }}" alt="{{ $ressource->nom }}" class="img-thumbnail" data-id="{{ $ressource->id }}">
                                <span>{{ $ressource->nom }} - {{ $ressource->prix }} DT</span>
                                <input type="number" name="ressources[{{ $ressource->id }}][quantite]" min="1" value="1" class="form-control mt-2" style="width: 100px;">
                                <div class="option-buttons">
                                    <button type="button" class="btn btn-success add-resource" data-id="{{ $ressource->id }}">Ajouter</button>
                                    <button type="button" class="btn btn-danger remove-resource" data-id="{{ $ressource->id }}" style="display: none;">Annuler</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="ressources_json" id="ressources-json">
              
            </div>
        </div>

        <div id="summary">
                    <h2>Résumé de votre personnalisation</h2>
                    <ul id="summary-list"></ul>
                    <p>Total: <span id="total-price">0</span> DT</p>
                </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('personnalisation-form');
    const preview = document.getElementById('preview');
    const summaryList = document.getElementById('summary-list');
    const totalPriceElement = document.getElementById('total-price');
    const addedResources = new Set();

    const updatePreview = () => {
        preview.innerHTML = '';
        summaryList.innerHTML = '';
        let totalPrice = 0;

        const resourcesData = [];

        addedResources.forEach(resourceId => {
            const option = form.querySelector(`img[data-id="${resourceId}"]`).closest('.custom-option');
            const imgSrc = option.querySelector('img').src;
            const resourceName = option.querySelector('span').textContent;
            const resourcePrice = parseFloat(option.querySelector('span').textContent.split(' - ')[1].replace(' DT', ''));
            const quantity = parseInt(option.querySelector('input[type=number]').value);
            totalPrice += resourcePrice * quantity;

            preview.innerHTML += `<div class="preview-image" style="background-image: url('${imgSrc}');"></div>`;
            summaryList.innerHTML += `<li>${resourceName} (x${quantity}) - ${resourcePrice * quantity} DT</li>`;
            resourcesData.push({
                id: resourceId,
                quantity: quantity
            });
        });

        totalPriceElement.textContent = totalPrice.toFixed(2);
        document.getElementById('ressources-json').value = JSON.stringify(resourcesData);
    };

    form.addEventListener('click', function(event) {
        if (event.target.classList.contains('type-button')) {
            const type = event.target.dataset.type;
            document.querySelectorAll('.options-group').forEach(group => {
                group.style.display = 'none';
            });
            document.getElementById(`${type}-options`).style.display = 'block';
        }

        if (event.target.classList.contains('add-resource')) {
            const resourceId = event.target.dataset.id;
            if (!addedResources.has(resourceId)) {
                addedResources.add(resourceId);
                event.target.style.display = 'none';
                const removeButton = form.querySelector(`.remove-resource[data-id="${resourceId}"]`);
                removeButton.style.display = 'inline';
                updatePreview();
            }
        }

        if (event.target.classList.contains('remove-resource')) {
            const resourceId = event.target.dataset.id;
            if (addedResources.has(resourceId)) {
                addedResources.delete(resourceId);
                event.target.style.display = 'none';
                const addButton = form.querySelector(`.add-resource[data-id="${resourceId}"]`);
                addButton.style.display = 'inline';
                updatePreview();
            }
        }
    });
});
</script>

<div class="cart-items">
    @foreach($cart as $item)
        <div class="cart-item">
            <img src="{{ asset('img/'.$item->produit->image) }}" alt="{{ $item->produit->nom }}" class="img-thumbnail">
            <div class="cart-item-details">
                <h3>{{ $item->produit->nom }}</h3>
                <p>Prix: {{ $item->produit->prix }} DT</p>
                <p>Quantité: {{ $item->quantite }}</p>
                <p>Total: {{ $item->produit->prix * $item->quantite }} DT</p>

                @if($item->produit->galleries->isNotEmpty())
                    <button class="btn-toggle-preview" data-image="{{ asset('img/'.$item->produit->galleries->first()->image) }}">tester</button>
              
                @endif
            </div>
        </div>
    @endforeach
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const preview = document.getElementById('preview');
    const previewContainer = document.querySelector('#preview');
    
    // Fonction pour ajouter une image de superposition
    function addOverlayImage(imageUrl) {
        const overlayImage = document.createElement('div');
        overlayImage.className = 'preview-image';
        overlayImage.style.backgroundImage = `url('${imageUrl}')`;
        preview.appendChild(overlayImage);
    }

    // Fonction pour mettre à jour l'aperçu
    function updatePreview() {
        const addedResources = document.querySelectorAll('.preview-image');
        preview.innerHTML = ''; // Vide d'abord pour réinitialiser l'affichage
        addedResources.forEach(image => {
            preview.appendChild(image); // Réajoute les images superposées
        });
    }

    // Gestion des clics sur les boutons d'aperçu
    document.querySelectorAll('.btn-toggle-preview').forEach(button => {
        button.addEventListener('click', function () {
            const imageUrl = this.getAttribute('data-image');

            if (this.classList.contains('active')) {
                // Si le bouton est déjà activé, annule l'affichage
                const overlayImages = document.querySelectorAll(`.preview-image[style*="${imageUrl}"]`);
                overlayImages.forEach(image => image.remove());
                this.classList.remove('active');
                this.textContent = 'tester';
            } else {
                // Sinon, ajoute l'image superposée
                addOverlayImage(imageUrl);
                this.classList.add('active');
                this.textContent = 'Annuler';
            }
        });
    });

    // Initialisation de l'aperçu avec les ressources déjà ajoutées (si applicable)
    updatePreview();
});
</script>



                <style>.cart-items {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacement entre les cartes */
}

.cart-item {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: calc(20% - 20px); /* Ajuster la largeur pour 5 cartes par ligne */
    box-sizing: border-box; /* Inclure le padding et la bordure dans la largeur */
}

.cart-item img {
    max-width: 100px;
    max-height: 100px;
    border-radius: 5px;
    margin-right: 15px;
}

.cart-item-details {
    flex: 1;
}

.cart-item-details h3 {
    margin: 0;
    font-size: 1.2em;
    color: #205681; /* Couleur personnalisée pour le titre */
}

.cart-item-details p {
    margin: 5px 0;
    font-size: 1em;
    color: #333;
}

.cart-item-details p:first-of-type {
    font-weight: bold;
}

.cart-item-details p:last-of-type {
    font-weight: bold;
    color: #d1e7dd; /* Couleur pour le total */
}

.cart-item-details p:nth-of-type(2) {
    color: #cfe2ff; /* Couleur pour le prix */
}

.btn-toggle-preview {
    margin-top: 10px;
    cursor: pointer;
}

</style>
@include('welcome.layout.footer')
