@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')

<div class="container">
    <h1>Créer un nouvel Attribut</h1>
    <form action="{{ route('attributs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de l'Attribut</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

@include('dashboard.layout.footer')