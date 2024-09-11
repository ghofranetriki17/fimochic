@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="container mt-4">
    <h2 class="mb-4">Détails de la Commande #{{ $commande->id }}</h2>

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

    <div class="mb-4">
        <strong>Client:</strong> {{ $commande->client->nom }}<br>
        <strong>Date de Commande:</strong> {{ $commande->date_cmd }}<br>
        <strong>Adresse:</strong> {{ $commande->adresse }}<br>
        <strong>Mode de Paiement:</strong> {{ ucfirst(str_replace('_', ' ', $commande->mode_paiement)) }}<br>
        <strong>Total:</strong> {{ $commande->prix }} DT<br>
        <strong>Statut:</strong>
        @if ($commande->etat == '0')
            En attente
        @elseif ($commande->etat == '1')
            Confirmée
        @else
            Livrée
        @endif
    </div>

    <h4>Produits Commandés</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>id</th>


                <th>Produit</th>
                <th>image</th>
 
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commande->lignesCommande as $ligne)
                <tr>
                    <td>{{ $ligne->produit->id }}</td>
                    <td>{{ $ligne->produit->name }}</td>
                    </td>
                    <td>
                        @if ($ligne->produit->image)
                            <img src="{{ asset('img/' . $ligne->produit->image) }}" alt="Image du produit" style="max-width: 100px;">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>{{ $ligne->qtecmnd }}</td>
                    <td>{{ $ligne->produit->prix }} DT</td>
                    <td>{{ $ligne->qtecmnd * $ligne->produit->prix }} DT</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('commandes.index') }}" class="btn btn-primary">Retour à la Liste des Commandes</a>
</div>
