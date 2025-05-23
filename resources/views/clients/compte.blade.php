@include('welcome.layout.head')
@include('welcome.layout.nav')

<div class="container mt-4">
    <h1>Mon Compte</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Détails du Compte
        </div>
        <div class="card-body">
            <p><strong>Prénom : </strong>{{ $client->preNom }}</p>
            <p><strong>Nom : </strong>{{ $client->nom }}</p>
            <p><strong>Email : </strong>{{ $client->user->email }}</p>
            <p><strong>Âge : </strong>{{ $client->age }}</p>
            <p><strong>Numéro de téléphone : </strong>{{ $client->numeroTel }}</p>
            <p><strong>Sexe : </strong>{{ $client->gender }}</p>
            <p><strong>Adresse : </strong>{{ $client->adresse }}</p>
            <p><strong>Inscrit en : </strong>{{ $client->created_at }}</p>
        </div>
        <div class="card-footer">
            <!-- Bouton pour ouvrir la modale -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Modifier mon compte
            </button>
        </div>
    </div>

    <!-- Modale pour modifier les informations du compte -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifier mon compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de mise à jour -->
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $client->nom) }}">
                                @error('nom')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                  

                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Âge</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $client->age) }}">
                                @error('age')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numeroTel" class="col-sm-2 col-form-label">Numéro de Téléphone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('numeroTel') is-invalid @enderror" id="numeroTel" name="numeroTel" value="{{ old('numeroTel', $client->numeroTel) }}">
                                @error('numeroTel')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse', $client->adresse) }}">
                                @error('adresse')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                    <!-- Fin du formulaire de mise à jour -->
                </div>
            </div>
        </div>
    </div>

    <!-- Section des Commandes -->
    <div class="card mt-4">
        <div class="card-header">
            Mes Commandes
        </div>
        <div class="card-body">
            @foreach ($commandes as $commande)
                <div class="timeline-item mt-4">
                    <div class="timeline-content">
                        <h5>Commande {{ $commande->created_at->format('d M Y') }}</h5>
                        <p><strong>Total :</strong> {{ $commande->prix }} DT</p>
                        <a href="{{ route('commandes.details', $commande->id) }}" class="btn btn-info btn-sm">Afficher</a>
                    </div>
                    <div class="timeline">
                        @for ($i = 0; $i <= 4; $i++)
                            <div class="timeline-step {{ getStepClass($i, $commande->etat) }}">
                                <div class="timeline-icon"></div>
                                <div class="timeline-label">{{ getStepLabel($i) }}</div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <a class="nav-link" href="{{ route('logout') }}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @include('welcome.layout.footer')
</div>

<!-- Helper functions for status classes and labels -->
@php
function getStepClass($stepIndex, $currentStep) {
    if ($stepIndex < $currentStep) {
        return 'completed';
    } elseif ($stepIndex == $currentStep) {
        return 'current';
    } else {
        return 'upcoming';
    }
}

function getStepLabel($stepIndex) {
    switch ($stepIndex) {
        case 0: return 'En attente';
        case 1: return 'Confirmée';
        case 2: return 'En stock/en fabrication';
        case 3: return 'En route';
        case 4: return 'Livrée';
        default: return '';
    }
}
@endphp

<style>
/* styles.css */

/* Container for timeline */
.timeline-item {
    position: relative;
    padding: 10px 0;
}

.timeline {
    display: flex;
    align-items: center;
    position: relative;
    padding-left: 30px;
    margin-top: 20px;
}

.timeline-step {
    position: relative;
    flex: 1;
    text-align: center;
}

.timeline-step .timeline-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #ddd;
    margin: 0 auto;
    position: relative;
}

.timeline-step .timeline-label {
    margin-top: 10px;
}

.timeline-step.completed .timeline-icon {
    background-color: green;
}

.timeline-step.current .timeline-icon {
    background-color: blue;
}

.timeline-step.upcoming .timeline-icon {
    background-color: gray;
}
</style>
