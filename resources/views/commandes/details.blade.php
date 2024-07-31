@include('welcome.layout.head')
@include('welcome.layout.nav')

<div class="container">
    <h1>Détails de la Commande</h1>

    <div class="card">
        <div class="card-header">
            Commande #{{ $commande->id }}
        </div>
        <div class="card-body">
            <p><strong>Date de la commande : </strong>{{ $commande->created_at }}</p>
            <p><strong>Statut : </strong>{{ $commande->status ? 'Livrée' : 'En attente' }}</p>

            <h3>Lignes de Commande</h3>
            <ul>
                @foreach ($commande->lignesCommande as $ligne)
                    <li>
                        <strong>Produit :</strong> {{ $ligne->produit->name }}<br>
                        <strong>Quantité :</strong> {{ $ligne->qtecmnd }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@include('welcome.layout.footer')
