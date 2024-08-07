@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
    <div class="container">
        <h1>Promotions</h1>
        <a href="{{ route('promotions.create') }}" class="btn btn-primary">Ajouter une promotion</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Ancien Prix</th>
                    <th>Nouveau Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->produit->id }}:{{ $promotion->produit->name }}</td>
                        <td>{{ $promotion->produit->prix }} €</td>
                        <td>{{ $promotion->new_price }} €</td>
                        <td>
                            <a href="{{ route('promotions.edit', $promotion) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('dashboard.layout.footer')
