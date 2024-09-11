
@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<div class="container">
    <h1 class="my-4">Gérer la FAQ</h1>
    <a href="{{ route('faq.create') }}" class="btn btn-primary mb-4">Ajouter une nouvelle question</a>

    @foreach($faqs as $faq)
    <div class="faq-item">
        <h4>{{ $faq->question }}</h4>
        <p>{{ $faq->reponse }}</p>
        @if($faq->video_url)
        <p>Vidéo: <a href="{{ $faq->video_url }}" target="_blank">{{ $faq->video_url }}</a></p>
        @endif
        <p>Likes: {{ $faq->likes_count }}</p>
        <a href="{{ route('faq.edit', $faq) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('faq.destroy', $faq) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
    @endforeach
</div>
