<!-- resources/views/galleries/create.blade.php -->

@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Ajouter une Image à la Galerie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" id="galleryForm">
        @csrf

        <div class="form-group">
            <label for="produit_id">Produit</label>
            <select class="form-control" id="produit_id" name="produit_id" required>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->id }}:{{ $produit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <!-- Bouton Retour -->
    <div class="mt-4">
        <a href="{{ route('galleries.create') }}" class="btn btn-secondary">Annuler</a>
    </div>
</div>

@include('dashboard.layout.footer')

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('galleryForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Empêche la soumission par défaut du formulaire
                
                // Soumettre le formulaire via AJAX ou normalement
                this.submit();
            });
        });
    </script>
@endpush
