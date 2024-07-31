<!-- resources/views/commandes/edit.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container mt-4">
    <h2 class="mb-4">Modifier la Commande #{{ $commande->id }}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="date_estimee_liv">Date Estimée de Livraison</label>
            <input type="date" class="form-control" id="date_estimee_liv" name="date_estimee_liv" value="{{ $commande->date_estimee_liv }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="etat">Statut</label>
            <select class="form-control" id="etat" name="etat" required>
                <option value="0" {{ $commande->etat == '0' ? 'selected' : '' }}>En attente</option>
                <option value="1" {{ $commande->etat == '1' ? 'selected' : '' }}>Confirmée</option>
                <option value="2" {{ $commande->etat == '2' ? 'selected' : '' }}>En stock/en fabrication</option>
                <option value="3" {{ $commande->etat == '3' ? 'selected' : '' }}>En route</option>
                <option value="4" {{ $commande->etat == '4' ? 'selected' : '' }}>Livrée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
