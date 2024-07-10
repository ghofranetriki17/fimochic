@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')

<h1>Créer une nouvelle valeur pour {{ $attribut->nom }}</h1>

    <form action="{{ route('valeurs.store', $attribut) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la valeur</label>
            <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer la valeur</button>
    </form>
@include('dashboard.layout.footer')
