@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<h1>Modifier une valeur</h1>

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('valeurs.update', $valeur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="attribut_id" class="form-label">Attribut</label>
                <select name="attribut_id" id="attribut_id" class="form-control" disabled>
                    <option value="{{ $valeur->attribut->id }}">{{ $valeur->attribut->nom }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la valeur</label>
                <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ $valeur->nom }}">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifier la valeur</button>
        </form>
    </div>
</div>

@include('dashboard.layout.footer')
