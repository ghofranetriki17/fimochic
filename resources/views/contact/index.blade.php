@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<style>

.table-success {
    
    --bs-table-bg: #8bf969;}</style>
<h1>Liste des Messages</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@foreach($contacts as $subject => $messages)
    <h2>{{ $subject }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $contact)
                <tr class="{{ $contact->is_read ? '' : 'table-success' }}">
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ Str::limit($contact->message, 50) }}</td>
                    <td>
                        <a href="mailto:{{ $contact->email }}?subject=Réponse à votre message" class="btn btn-info">Répondre</a>
                        @if(!$contact->is_read)
                            <form action="{{ route('contact.markAsRead', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Marquer comme lu</button>
                            </form>
                        @endif
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach

<a href="{{ route('contact.create') }}" class="btn btn-primary">Ajouter un Contact</a>
