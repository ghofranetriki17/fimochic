@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<main class="ml-4">
    <div class="pagetitle">
        <h1>Modifier Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Liste des Clients</a></li>
                <li class="breadcrumb-item active">Modifier</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulaire de Modification</h5>

                        <!-- Formulaire de mise à jour -->
                        <form action="{{ route('clients.update', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="preNom" class="col-sm-2 col-form-label">Prénom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('preNom') is-invalid @enderror" id="preNom" name="preNom" value="{{ old('preNom', $client->preNom) }}">
                                    @error('preNom')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $client->nom) }}">
                                    @error('nom')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mail" class="col-sm-2 col-form-label">Adresse Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" value="{{ old('mail', $client->user->email) }}">
                                    @error('mail')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-sm-2 col-form-label">Âge</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $client->age) }}">
                                    @error('age')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="numeroTel" class="col-sm-2 col-form-label">Numéro de Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('numeroTel') is-invalid @enderror" id="numeroTel" name="numeroTel" value="{{ old('numeroTel', $client->numeroTel) }}">
                                    @error('numeroTel')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe" value="{{ old('sexe', $client->gender) }}">
                                    @error('sexe')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse', $client->adresse) }}">
                                    @error('adresse')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </div>
                            </div>
                        </form>
                        <!-- Fin du formulaire de mise à jour -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@include('dashboard.layout.footer')
