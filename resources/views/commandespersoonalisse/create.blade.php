@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<!-- Formulaire de création de commande personnalisée -->
<form action="{{ route('commandespersoonalisse.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label for="client_id">Client :</label>
            <select id="client_id" name="client_id" class="form-control" required>
                <option value="">Sélectionnez un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->id }}</option>
                @endforeach
            </select>
            @error('client_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    <div class="form-group">
        <label for="image_reelle">Image Réelle :</label>
        <input type="file" class="form-control" id="image_reelle" name="image_reelle" accept="image/*" required>
        @error('image_reelle')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image_perso">Image Personnalisée :</label>
        <input type="file" class="form-control" id="image_perso" name="image_perso" accept="image/*" required>
        @error('image_perso')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
    <label for="commande_date">Date de Commande :</label>
    <select id="commande_date" name="commande_date" class="form-control" required>
        <option value="">Sélectionnez une date</option>
        @foreach($dates as $date)
            <option value="{{ $date }}">{{ $date }}</option>
        @endforeach
    </select>
    @error('commande_date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
        <label for="note">Note :</label>
        <textarea class="form-control" id="note" name="note"></textarea>
        @error('note')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="prix_total">Prix Total :</label>
        <input type="number" class="form-control" id="prix_total" name="prix_total" step="0.01" required>
        @error('prix_total')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required>
        @error('adresse')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="methode_paiement">Méthode de Paiement :</label>
        <input type="text" class="form-control" id="methode_paiement" name="methode_paiement" required>
        @error('methode_paiement')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Créer Commande</button>
</form>
