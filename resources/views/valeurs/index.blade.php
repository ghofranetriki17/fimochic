@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')

<h1>Liste des attributs et valeurs associées</h1>

<div class="row">
    <div class="col-md-6">
        <h3>Liste des attributs</h3>
        <ul class="list-group">
            @foreach ($attributs as $attribut)
                <li class="list-group-item">
                    <a href="{{ route('valeurs.index', $attribut) }}">{{ $attribut->nom }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-6">
        <h3>Ajouter une valeur</h3>
        <form action="{{ route('valeurs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="attribut_id" class="form-label">Sélectionner un attribut</label>
                <select name="attribut_id" id="attribut_id" class="form-control @error('attribut_id') is-invalid @enderror">
                    <option value="">Choisir un attribut</option>
                    @foreach ($attributs as $attribut)
                        <option value="{{ $attribut->id }}">{{ $attribut->nom }}</option>
                    @endforeach
                </select>
                @error('attribut_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la valeur</label>
                <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ajouter la valeur</button>
        </form>
    </div>
</div>

<!-- Tableau des attributs et leurs valeurs associées -->
<div class="row mt-4">
    <div class="col-md-12">
        <h3>Attributs et leurs valeurs associées</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Attribut</th>
                    <th>Valeurs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributs as $attribut)
                    <tr>
                        <td>{{ $attribut->nom }}</td>
                        <td>
                            <ul>
                                @foreach ($attribut->valeurs as $valeur)
                                    <li>{{ $valeur->nom }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <!-- Bouton Modifier -->
                                <a href="{{ route('valeurs.edit', $valeur) }}" class="btn btn-sm btn-primary">Modifier</a>
                                
                                <!-- Formulaire de Suppression -->
                                <form action="{{ route('valeurs.destroy', $valeur) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('dashboard.layout.footer')
