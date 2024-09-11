@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<h1>Liste des Paramètres</h1>
    <a href="{{ route('parametres.create') }}">Créer un nouveau paramètre</a>

    @if ($parametres->isEmpty())
        <p>Aucun paramètre trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Clé</th>
                    <th>Valeur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parametres as $parametre)
                    <tr>
                        <td>{{ $parametre->key }}</td>
                        <td>{{ $parametre->value }}</td>
                        <td>
                            <a href="{{ route('parametres.edit', $parametre->id) }}">Modifier</a>
                            <form action="{{ route('parametres.destroy', $parametre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif