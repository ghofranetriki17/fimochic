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
            <p><strong>Prénom : </strong>{{ $client->user->name }}</p>
            <p><strong>Nom : </strong>{{ $client->nom }}</p>
            <p><strong>Email : </strong>{{ $client->user->email }}</p>
            <p><strong>Âge : </strong>{{ $client->age }}</p>
            <p><strong>Numéro de téléphone : </strong>{{ $client->numeroTel }}</p>
            <p><strong>Sexe : </strong>{{ $client->gender }}</p>
            <p><strong>Adresse : </strong>{{ $client->adresse }}</p>
            <p><strong>Inscrit en : </strong>{{ $client->created_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Modifier mon compte</a>
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
                        <h5>Commande  {{ $commande->created_at->format('d M Y') }}</h5>
                        <p><strong>Total :</strong> {{ $commande->prix}} DT</p>
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
<style>/* styles.css */

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
    margin-top: 5px;
    font-size: 12px;
    color: #555;
}

/* Status colors */
.timeline-step.completed .timeline-icon {
    background-color: #32cd32; /* Vert lime pour complété */
}


.timeline-step.current .timeline-icon {
    background-color: #ff1e1e;
}

.timeline-step.upcoming .timeline-icon {
    background-color: #ccc; /* Gris pour à venir */
}

.timeline-step:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 10px;
    left: 20px;
    width: 100%;
    height: 2px;
    background-color: #ddd;
    z-index: -1;
}
</style>