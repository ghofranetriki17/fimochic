
@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
{{-- resources/views/commandespersonnalisee/create.blade.php --}}

<div class="container">
    <h1>Commandes Personnalisées</h1>
    <a href="{{ route('commandespersoonalisse.create') }}" class="btn btn-primary">Nouvelle Commande Personnalisée</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Image Réelle</th>
                <th>Image Personnalisée</th>
                <th>Date de Commande</th>
                <th>Note</th>
                <th>Prix Total</th>
                <th>Adresse</th>
                <th>Méthode de Paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->client->id }}</td>
                    <td>
    <!-- Afficher l'image réelle -->
    @if($commande->image_reelle)
        <img src="{{ asset('img/' . $commande->image_reelle) }}" alt="Image Réelle" style="width: 100px; height: auto;">
    @else
        Pas d'image
    @endif
</td>

<td>
    <!-- Afficher l'image personnalisée -->
    @if($commande->image_perso)
        <img src="{{ asset('img/' . $commande->image_perso) }}" alt="Image Personnalisée" style="width: 100px; height: auto;">
    @else
        Pas d'image
    @endif
</td>

<td>{{ $commande->commande_date }}</td>

                    <td>{{ $commande->note }}</td>
                    <td>{{ $commande->prix_total }}</td>
                    <td>{{ $commande->adresse }}</td>
                    <td>{{ $commande->methode_paiement }}</td>
                    <td>
                        <a href="{{ route('commandespersoonalisse.show', $commande->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('commandespersoonalisse.edit', $commande->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('commandespersoonalisse.destroy', $commande->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>