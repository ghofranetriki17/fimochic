@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')


<div class="container">
    <h2>Modifier la Commande Personnalisée</h2>

    <form action="{{ route('commandespersoonalisse.updateAdmin', $commande->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ID du client -->
        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} (ID: {{ $client->id }})
                    </option>
                @endforeach
            </select>
            @error('client_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image réelle -->
        <div class="form-group">
            <label for="image_reelle">Image Réelle</label>
            <input type="file" name="image_reelle" id="image_reelle" class="form-control">
            @if($commande->image_reelle)
                <img src="{{ asset('img/' . $commande->image_reelle) }}" alt="Image Réelle" style="width: 100px; height: auto;">
            @endif
            @error('image_reelle')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image personnalisée -->
        <div class="form-group">
            <label for="image_perso">Image Personnalisée</label>
            <input type="file" name="image_perso" id="image_perso" class="form-control">
            @if($commande->image_perso)
                <img src="{{ asset('img/' . $commande->image_perso) }}" alt="Image Personnalisée" style="width: 100px; height: auto;">
            @endif
            @error('image_perso')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <!-- Note -->
        <div class="form-group">
            <label for="note">Note</label>
            <textarea name="note" id="note" class="form-control">{{ old('note', $commande->note) }}</textarea>
            @error('note')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Prix total -->
        <div class="form-group">
            <label for="prix_total">Prix Total</label>
            <input type="number" step="0.01" name="prix_total" id="prix_total" class="form-control" value="{{ old('prix_total', $commande->prix_total) }}" required>
            @error('prix_total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $commande->adresse) }}" required>
            @error('adresse')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Méthode de paiement -->
        <div class="form-group">
            <label for="methode_paiement">Méthode de Paiement</label>
            <input type="text" name="methode_paiement" id="methode_paiement" class="form-control" value="{{ old('methode_paiement', $commande->methode_paiement) }}" required>
            @error('methode_paiement')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
