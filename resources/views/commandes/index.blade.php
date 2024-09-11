<!-- resources/views/commandes/index.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container mt-4">
    <h2 class="mb-4">Liste des Commandes</h2>

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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date de Commande</th>
                <th>Date Estimée de Livraison</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->client->id }}:{{ $commande->client->preNom }}</td>
                    <td>{{ $commande->date_cmd }}</td>
                    <td>{{ $commande->date_estimee_liv }}</td>
                    <td>{{ $commande->prix }} DT</td>
                    <td>
                        @if ($commande->etat == '0')
                            En attente
                        @elseif ($commande->etat == '1')
                            Confirmée
                        @elseif ($commande->etat == '2')
                            En stock/en fabrication
                        @elseif ($commande->etat == '3')
                            En route
                        @else
                            Livrée
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-info btn-sm">Voir Détails</a>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
