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
            <p><strong>Prénom : </strong>{{ $client->prenom }}</p>
            <p><strong>Nom : </strong>{{ $client->nom }}</p>
            <p><strong>Email : </strong>{{ $client->mail }}</p>
            <p><strong>Âge : </strong>{{ $client->age }}</p>
            <p><strong>Numéro de téléphone : </strong>{{ $client->numero_tel }}</p>
            <p><strong>Sexe : </strong>{{ $client->gender }}</p>
            <p><strong>Adresse : </strong>{{ $client->adresse }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Modifier mon compte</a>
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
