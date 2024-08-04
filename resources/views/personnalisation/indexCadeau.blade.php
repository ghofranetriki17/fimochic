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

    .btn-primary {
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

@include('welcome.layout.footer')
