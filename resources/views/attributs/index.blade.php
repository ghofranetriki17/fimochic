@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Liste des Attributs</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('attributs.create') }}" class="btn btn-primary">Créer un nouvel attribut</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attributs as $attribut)
                <tr>
                    <td>{{ $attribut->nom }}</td>
                    <td>
                        <a href="{{ route('attributs.edit', $attribut->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('attributs.destroy', $attribut->id) }}" method="POST" style="display:inline;">
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