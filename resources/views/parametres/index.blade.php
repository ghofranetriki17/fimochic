@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<style>/* Style du tableau */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

button {
    background-color: pink;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #d9534f;
}
</style>
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