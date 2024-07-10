@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')


<div class="container">
    <h1>Liste des Ressources</h1>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ressources.create') }}" class="btn btn-primary mb-3">Ajouter une Ressource</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Couleur</th>
                <th>Type</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->id }}</td>
                    <td>{{ $ressource->nom }}</td>
                    <td>{{ $ressource->quantite }}</td>
                    <td>{{ $ressource->couleur }}</td>
                    <td>{{ $ressource->type }}</td>
                    <td>
                        @if($ressource->image)
                            <img src="{{ asset('storage/' . $ressource->image) }}" alt="Image" width="50">
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
</div>
@include('dashboard.layout.footer')
