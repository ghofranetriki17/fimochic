@include('dashboard.layout.header')
    @include('dashboard.layout.nav')
    @include('dashboard.layout.asside')
    @include('dashboard.layout.script')
    @include('dashboard.layout.cssperso')
<style>.table-success {
    --bs-table-color: #fff;
    --bs-table-bg: #5ae04a;}</style>
    <div class="container">
        <h1>Codes Promo</h1>
        <a href="{{ route('promo_codes.create') }}" class="btn btn-primary">Ajouter un code promo</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Pourcentage</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promoCodes as $promoCode)
                    <tr class="{{ $promoCode->isValid() ? 'table-success' : '' }}">
                        <td>{{ $promoCode->code }}</td>
                        <td>{{ $promoCode->percentage }}%</td>
                        <td>{{ $promoCode->start_date->format('d/m/Y') }}</td>
                        <td>{{ $promoCode->end_date->format('d/m/Y') }}</td>
                        <td>{{ $promoCode->isValid() ? 'Valide' : 'Invalide' }}</td>
                        <td>
                            <a href="{{ route('promo_codes.edit', $promoCode) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('promo_codes.destroy', $promoCode) }}" method="POST" style="display:inline;">
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