<!-- resources/views/clients/create.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')


<main>
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Gestion de la Relation Client (CRM)</li>
                <li class="breadcrumb-item active">ajout des Clients</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulaire de Création de Client</h5>

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf

                         
                            <div class="input-field">
                                <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required>
                                <label for="prenom">Prénom</label>
                                @error('prenom')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required>
                                <label for="nom">Nom</label>
                                @error('nom')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <input id="mail" type="email" name="mail" value="{{ old('mail') }}" required>
                                <label for="mail">Email</label>
                                @error('mail')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <input id="age" type="number" name="age" value="{{ old('age') }}" min="18" max="100" required>
                                <label for="age">Âge</label>
                                @error('age')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <input id="numero_tel" type="tel" name="numero_tel" value="{{ old('numero_tel') }}" required>
                                <label for="numero_tel">Numéro de Téléphone</label>
                                @error('numero_tel')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <label for="sexe">Sexe</label><br>
                                <div class="radio-group">
                                    <input type="radio" id="male" name="sexe" value="male" class="radio-custom" required>
                                    <label for="male">Homme</label>
                                    <input type="radio" id="female" name="sexe" value="female" class="radio-custom">
                                    <label for="female">Femme</label>
                                    <input type="radio" id="other" name="sexe" value="other" class="radio-custom">
                                    <label for="other">Autre</label>
                                </div>
                                @error('sexe')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <input id="adresse" type="text" name="adresse" value="{{ old('adresse') }}" required>
                                <label for="adresse">Adresse</label>
                                @error('adresse')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field">
    <input id="password" type="password" name="password" required>
    <label for="password">Mot de passe</label>
    @error('password')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>


                            <button type="submit" class="btn btn-primary">Ajouter Client</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

@include('dashboard.layout.footer')
