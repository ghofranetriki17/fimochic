@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Modifier l'Attribut</h1>
    <form action="{{ route('attributs.update', $attribut->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom de l'Attribut</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $attribut->nom }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@include('dashboard.layout.footer')