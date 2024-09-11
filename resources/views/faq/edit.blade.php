
@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')
<div class="container">
    <h1>Modifier la question</h1>
    <form action="{{ route('faq.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_de_question">Type de question</label>
            <input type="text" name="type_de_question" id="type_de_question" class="form-control" value="{{ $faq->type_de_question }}" required>
        </div>
        <div class="form-group">
            <label for="question">Question</label>
            <textarea name="question" id="question" class="form-control" required>{{ $faq->question }}</textarea>
        </div>
        <div class="form-group">
            <label for="reponse">Réponse</label>
            <textarea name="reponse" id="reponse" class="form-control" required>{{ $faq->reponse }}</textarea>
        </div>
        <div class="form-group">
            <label for="video_url">URL de la vidéo (optionnel)</label>
            <input type="text" name="video_url" id="video_url" class="form-control" value="{{ $faq->video_url }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
