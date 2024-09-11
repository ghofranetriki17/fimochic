@include('dashboard.layout.header')
@include('dashboard.layout.nav')
@include('dashboard.layout.asside')
@include('dashboard.layout.script')
@include('dashboard.layout.cssperso')

<div class="container">
    <h1>Ajouter une nouvelle question</h1>
    <form action="{{ route('faq.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="video">Vidéo (optionnel)</label>
        <input type="file" name="video" id="video" class="form-control" accept=".mp4, .avi, .mov, .wmv">
    </div>
        <div class="form-group">
            <label for="type_de_question">Type de question</label>
            <input type="text" name="type_de_question" id="type_de_question" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="question">Question</label>
            <textarea name="question" id="question" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="reponse">Réponse</label>
            <textarea name="reponse" id="reponse" class="form-control" required></textarea>
        </div>
       
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
