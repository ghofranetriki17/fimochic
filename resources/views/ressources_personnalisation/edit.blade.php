@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<div class="container">
    <h1>Éditer la Ressource</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ressources_personnalisation.update', $ressource_personnalisation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="photo">Photo de la Ressource</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
            @if ($ressource_personnalisation->image)
                <img src="{{ asset('img/' . $ressource_personnalisation->image) }}" alt="{{ $ressource_personnalisation->nom }}" style="width: 100px; height: auto;">
            @endif
        </div>

        <div class="form-group">
            <label for="nom">Nom de la Ressource</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $ressource_personnalisation->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $ressource_personnalisation->type) }}" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $ressource_personnalisation->prix) }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>