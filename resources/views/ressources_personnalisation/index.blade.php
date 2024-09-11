@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Liste des Ressources Personnalisées</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ressources_personnalisation.create') }}" class="btn btn-primary">Ajouter une Ressource</a>

    @foreach ($ressourcesParCatEtType as $cat => $types)
        <h2>Catégorie : {{ $cat }}</h2>
        @foreach ($types as $type => $ressources)
            <h3>Type : {{ $type }}</h3>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ressources as $ressource)
                        <tr>
                            <td>
                                @if ($ressource->image)
                                    <img src="{{ asset('img/' . $ressource->image) }}" alt="{{ $ressource->nom }}" style="width: 100px; height: auto;">
                                @endif
                            </td>
                            <td>{{ $ressource->nom }}</td>
                            <td>{{ $ressource->prix }}</td>
                            <td>
                                <a href="{{ route('ressources_personnalisation.edit', $ressource->id) }}" class="btn btn-warning">Éditer</a>
                                <form action="{{ route('ressources_personnalisation.destroy', $ressource->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endforeach
</div>

@include('dashboard.layout.footer')
