@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<h1>Créer un nouveau paramètre</h1>

<form action="{{ route('parametres.store') }}" method="POST">
    @csrf
    <div>
        <label for="key">Clé :</label>
        <input type="text" name="key" id="key" required>
    </div>
    <div>
        <label for="value">Valeur :</label>
        <input type="text" name="value" id="value" required>
    </div>
    <button type="submit">Créer</button>
</form>