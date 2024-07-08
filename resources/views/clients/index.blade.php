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
                <li class="breadcrumb-item active">Liste des Clients</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tableau des Clients</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Adresse Email</th>
                                    <th>Âge</th>
                                    <th>Numéro de Téléphone</th>
                                    <th>Sexe</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->preNom }}</td>
                                        <td>{{ $client->nom }}</td>
                                        <td>{{ $client->user->email }}</td>
                                        <td>{{ $client->age }}</td>
                                        <td>{{ $client->numeroTel }}</td>
                                        <td>{{ $client->gender }}</td>
                                        <td>{{ $client->adresse }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Modifier</a>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@include('dashboard.layout.footer')
