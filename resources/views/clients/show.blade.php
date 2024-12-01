@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<main class="ml-4">
    <div class="pagetitle">
        <h1>Détails du Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Liste des Clients</a></li>
                <li class="breadcrumb-item active">Détails</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations du Client</h5>

                        <!-- Détails du client -->
                        <div class="row mb-3">
                            <label for="preNom" class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10">
                                <p>{{ $client->preNom }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <p>{{ $client->nom }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mail" class="col-sm-2 col-form-label">Adresse Email</label>
                            <div class="col-sm-10">
                                <p>{{ $client->user->email }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Âge</label>
                            <div class="col-sm-10">
                                <p>{{ $client->age }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numeroTel" class="col-sm-2 col-form-label">Numéro de Téléphone</label>
                            <div class="col-sm-10">
                                <p>{{ $client->numeroTel }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
                            <div class="col-sm-10">
                                <p>{{ $client->gender }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-10">
                                <p>{{ $client->adresse }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@include('dashboard.layout.footer')
