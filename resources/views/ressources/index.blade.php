@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')



<div class="container">
    <h1>Liste des Ressources</h1>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ressources.create') }}" class="btn btn-primary mb-3">Ajouter une Ressource</a>

    @foreach ($ressources->groupBy('type') as $type => $groupedRessources)
        <h2>{{ $type }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Couleur</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groupedRessources as $ressource)
                    <tr>
                        <td>{{ $ressource->nom }}</td>
                        <td>{{ $ressource->quantite }}</td>
                        <td>{{ $ressource->couleur }}</td>
                        <td>
                            @if($ressource->image)
                                <img src="{{ asset('img/' . $ressource->image) }}" alt="Image" width="50">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ressources.show', $ressource->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('ressources.edit', $ressource->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('ressources.destroy', $ressource->id) }}" method="POST" style="display:inline;">
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
</div>


@include('dashboard.layout.footer')
