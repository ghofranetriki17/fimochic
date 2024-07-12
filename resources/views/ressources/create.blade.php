@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Ajouter une Ressource</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ressources.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="photo">Photo de la Ressource</label>
        <input type="file" class="form-control-file" id="photo" name="photo">
    </div>

    <div class="form-group">
        <label for="nom">Nom de la Ressource</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="quantite">Quantité</label>
        <input type="number" class="form-control" id="quantite" name="quantite" required>
    </div>
    <div class="form-group">
        <label for="couleur">Couleur</label>
        <input type="text" class="form-control" id="couleur" name="couleur" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>

</div>
@include('dashboard.layout.footer')
