<!-- resources/views/clients/create.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')

<main>
    <div class="pagetitle">
        <h1>Créer un Nouveau Client</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulaire de Création de Client</h5>

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">ID de l'utilisateur</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" name="mail" id="mail" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="age">Âge</label>
                                <input type="number" name="age" id="age" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="numero_tel">Numéro de Téléphone</label>
                                <input type="text" name="numero_tel" id="numero_tel" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="sexe">Sexe</label>
                                <input type="text" name="sexe" id="sexe" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control">
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
