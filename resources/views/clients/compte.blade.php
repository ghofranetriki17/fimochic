@include('welcome.layout.head')
@include('welcome.layout.nav')

<div class="container">
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
            <h5>Commandes En Attente</h5>
            @if ($commandes->where('etat', 0)->count() > 0)
                <ul class="list-group">
                    @foreach ($commandes->where('etat', 0) as $commande)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Commande #{{ $commande->id }} - {{ $commande->created_at }}
                            <a href="{{ route('commandes.details', $commande->id) }}" class="btn btn-info btn-sm">Afficher</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune commande en attente.</p>
            @endif

            <h5 class="mt-4">Commandes Livrées</h5>
            @if ($commandes->where('etat', 1)->count() > 0)
                <ul class="list-group">
                    @foreach ($commandes->where('etat', 1) as $commande)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Commande #{{ $commande->id }} - {{ $commande->created_at }}
                            <a href="{{ route('commandes.details', $commande->id) }}" class="btn btn-info btn-sm">Afficher</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune commande livrée.</p>
            @endif
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
