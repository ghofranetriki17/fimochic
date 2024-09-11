
@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1 class="mb-4">Commentaires des Produits</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @foreach($commentsGrouped as $produitId => $comments)
        <h2>Produit: {{ $comments->first()->produit->name }}</h2>
        <p><strong>Nombre total de likes:</strong> {{ $likeCounts[$produitId] ?? 0 }}</p>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Commentaire</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                @if($comment->commentaire||$comment->image)
                
                <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->client->id }} : {{ $comment->client->nom }} {{ $comment->client->preNom }}</td>
                        <td>{{ $comment->commentaire }}</td>
                        <td>
                            @if($comment->image)
                                <img src="{{ asset('img/' . $comment->image) }}" alt="Image du commentaire" width="100">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('product_like_comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <p>pas de commentaires pour le moment!</p>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>