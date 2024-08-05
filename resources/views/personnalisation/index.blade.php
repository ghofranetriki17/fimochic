@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1 class="mb-4">Personnalisations des Clients</h1>
    @foreach($personnalisations as $client_id => $dates)
        <h2>Client ID: {{ $client_id }}</h2>
        <h3>Nom: {{ $dates->first()->first()->client->nom }} {{ $dates->first()->first()->client->preNom }}</h3>
        
        @foreach($dates as $date => $personnalisationsClient)
            <h4>Commande de: {{ $date }}</h4>
            
          
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Type de Ressource</th>
                        <th>Image</th>
                        <th>Quantité</th>
                        <th>Prix Total</th>
                        <th>Date de Création</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($personnalisationsClient as $personnalisation)
                        <tr>
                            <td>{{ $personnalisation->ressourcePersonnalisation->id }} {{ $personnalisation->ressourcePersonnalisation->nom }}</td>
                            <td>
                                @if($personnalisation->ressourcePersonnalisation->image)
                                    <img src="{{ asset('img/' . $personnalisation->ressourcePersonnalisation->image) }}" alt="{{ $personnalisation->ressourcePersonnalisation->nom }}" width="50">
                                @else
                                    Pas d'image
                                @endif
                            </td>
                            <td>{{ $personnalisation->quantite }}</td>
                            <td>{{ $personnalisation->prix_total }}</td>
                            <td>{{ $personnalisation->created_at }}</td>
                            <td>      <form action="{{ route('clientRessourcePersonnalisations.destroy', ['clientRessourcePersonnalisation' => $personnalisation->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endforeach
</div>
