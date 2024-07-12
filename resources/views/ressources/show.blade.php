@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="container">
        <div class="card">
            <div class="card-header">
                Détails de la ressource
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $ressource->nom }}</h5>
                <p class="card-text">Quantité: {{ $ressource->quantite }}</p>
                <p class="card-text">Couleur: {{ $ressource->couleur }}</p>
                <p class="card-text">Type: {{ $ressource->type }}</p>
                @if ($ressource->image)
                    <img src="{{ asset('img/' . $ressource->image) }}" alt="Image de la ressource" class="img-fluid">
                @else
                    <p>Aucune image disponible</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('ressources.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>
    @include('dashboard.layout.footer')
