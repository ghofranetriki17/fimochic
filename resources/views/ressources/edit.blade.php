@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <div class="card">
        <div class="card-header">
            Modifier la ressource
        </div>
        <div class="card-body">
            <form action="{{ route('ressources.update', $ressource->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $ressource->nom }}" required>
                </div>

                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $ressource->quantite }}" required>
                </div>

                <div class="form-group">
                    <label for="couleur">Couleur</label>
                    <input type="text" class="form-control" id="couleur" name="couleur" value="{{ $ressource->couleur }}" required>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $ressource->type }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($ressource->image)
                        <img src="{{ asset('img/' . $ressource->image) }}" alt="Image de la ressource" class="img-fluid mt-2" style="max-width: 200px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Sauvegarder</button>
                <a href="{{ route('ressources.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>

@include('dashboard.layout.footer')
