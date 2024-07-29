@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
    <div class="container">
        <h1>Modifier la Promotion</h1>
        <form action="{{ route('promotions.update', $promotion) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Produit</label>
                <select id="product_id" name="product_id" class="form-control">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}" {{ $produit->id == $promotion->product_id ? 'selected' : '' }}>
                            {{ $produit->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="new_price">Nouveau Prix</label>
                <input type="text" id="new_price" name="new_price" class="form-control" value="{{ old('new_price', $promotion->new_price) }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Sauvegarder</button>
        </form>
    </div>
    @include('dashboard.layout.footer')
