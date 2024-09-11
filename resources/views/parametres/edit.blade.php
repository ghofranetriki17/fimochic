@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<h1>Modifier le paramètre</h1>

    <form action="{{ route('parametres.update', $parametre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="key">Clé :</label>
            <input type="text" name="key" id="key" value="{{ $parametre->key }}" required>
        </div>
        <div>
            <label for="value">Valeur :</label>
            <input type="text" name="value" id="value" value="{{ $parametre->value }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>