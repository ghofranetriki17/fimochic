@include('welcome.layout.head')
@include('welcome.layout.nav')

<div class="container">
    <h1>Détails de la Commande</h1>

    <div class="card">
        <div class="card-header">
            Commande de :{{  $commande->date_cmd  }}
        </div>
        <div class="card-body">
            <p><strong>Date de la commande : </strong>{{ $commande->created_at }}</p>
            <p><strong>Statut : </strong>{{ $commande->status ? 'Livrée' : 'En attente' }}</p>
<p>        <strong>Adresse:</strong> {{ $commande->adresse }}<br>
</p>
<p>        <strong>Mode de Paiement:</strong> {{ ucfirst(str_replace('_', ' ', $commande->mode_paiement)) }}<br>
</p>
<p>        <strong>Total:</strong> {{ $commande->prix }} DT<br>
</p>
            <h3>Lignes de Commande</h3>
            <ul>
    <table class="table table-bordered">
        <thead>
            <tr>


                <th>Produit</th>
                <th>image</th>
 
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
                <th>date estimee pour la livraison</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($commande->lignesCommande as $ligne)
                <tr>
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
                    <td>{{ $commande->date_estimee_liv}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


            </ul>
               <!-- Bouton de retour au compte -->
               <a href="{{ route('clients.compte') }}" class="btn btn-primary">Retour au Compte</a>
        </div>
        </div>
    </div>
    
</div>
@include('welcome.layout.footer')
