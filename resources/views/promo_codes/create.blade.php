@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso') <div class="container">
        <h1>Ajouter un Code Promo</h1>
        <form action="{{ route('promo_codes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="percentage">Pourcentage</label>
                <input type="number" class="form-control" id="percentage" name="percentage" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="start_date">Date de Début</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de Fin</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>