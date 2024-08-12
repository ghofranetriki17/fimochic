@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>
/* Styles généraux pour la page FAQ */
.coontainer {
    margin-top: 110px!important; /* Ajustez selon vos besoins */
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

.faq-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.faq-item:hover {
    background-color: #f1f1f1;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.faq-item h4 {
    color: #007bff;
    cursor: pointer;
    margin-bottom: 10px;
    font-size: 18px;
    transition: color 0.3s;
}

.faq-item h4:hover {
    color: #0056b3;
}

.faq-item p {
    color: #333;
    display: none;
    margin-bottom: 10px;
    font-size: 16px;
}

.faq-item video {
    width: 100%;
    max-height: 300px;
    border-radius: 4px;
    margin-top: 10px;
}

/* Style pour le bouton "Voir la démo" */
.faq-item .btn-demo {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.faq-item .btn-demo:hover {
    background-color: #0056b3;
}

.faq-item .btn-demo .icon {
    margin-right: 8px;
}

/* Styles pour le bouton "Utile" */
.faq-item .btn-like {
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.faq-item .btn-like:hover {
    background-color: #218838;
}

.faq-item .btn-like .icon {
    margin-right: 8px;
}

/* Styles pour la modale */
.modal {
    display: none; 
    position: fixed;
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto;
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px;
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 800px;
    position: relative;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}
    
    .faq-item {
        position: relative;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .faq-item .btn-like,
    .faq-item .btn-demo {
        display: none; /* Masquer par défaut */
    }

    .faq-item.active .btn-like,
    .faq-item.active .btn-demo {
        display: block; /* Afficher lorsque la réponse est visible */
    }
</style>
<div class="coontainer">
    <h1 class="my-4">FAQ</h1>

    <!-- Section des questions les plus utiles -->
    <h3>Questions les plus utiles</h3>
    @foreach($topFaqs as $faq)
    <div class="faq-item">
    <i class="fas fa-thumbs-up icon"></i> ({{ $faq->likes_count }})

        <h4 onclick="toggleAnswer(this)">{{ $faq->question }}</h4>
        <p>{{ $faq->reponse }}</p>
        @if($faq->video_url)
        <button class="btn-demo" onclick="openModal('{{ asset('videos/' . $faq->video) }}')">Voir Vidéo</button>
        </button>
        @endif
        <button class="btn-like" onclick="event.preventDefault(); document.getElementById('like-form-{{ $faq->id }}').submit();">
            <i class="fas fa-thumbs-up icon"></i>Utile ({{ $faq->likes_count }})
        </button>
        <form id="like-form-{{ $faq->id }}" action="{{ route('faq.like', $faq) }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    @endforeach

    <!-- Section par type de question -->
    @foreach($faqs as $type => $questions)
    <h3>{{ $type }}</h3>
    @foreach($questions as $faq)
    <div class="faq-item">
        <h4 onclick="toggleAnswer(this)">{{ $faq->question }}</h4>
        <p>{{ $faq->reponse }}</p>
        @if($faq->video_url)
        <button class="btn-demo" onclick="openModal('{{ $faq->video_url }}')">
            <i class="fas fa-video icon"></i>Voir la démo
        </button>
        @endif
        <button class="btn-like" onclick="event.preventDefault(); document.getElementById('like-form-{{ $faq->id }}').submit();">
            <i class="fas fa-thumbs-up icon"></i>Utile ({{ $faq->likes_count }})
        </button>
        <form id="like-form-{{ $faq->id }}" action="{{ route('faq.like', $faq) }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    @endforeach
    @endforeach
</div>

<!-- Modale pour la vidéo -->
<div id="videoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <video id="modalVideo" controls>
            <source src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    function toggleAnswer(element) {
        var faqItem = element.parentElement;
        var p = element.nextElementSibling;
        p.style.display = (p.style.display === 'block') ? 'none' : 'block';
        faqItem.classList.toggle('active', p.style.display === 'block');
    }

    function openModal(videoUrl) {
        var modal = document.getElementById('videoModal');
        var modalVideo = document.getElementById('modalVideo');
        modalVideo.src = videoUrl;
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById('videoModal');
        var modalVideo = document.getElementById('modalVideo');
        modalVideo.src = ""; // Clear the video source
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('videoModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
<!-- Section Autres questions -->
<div class="coontainer">
    <h3>Autres questions</h3>
    <p>Si vous avez d'autres questions, n'hésitez pas à nous <a href="{{ route('contact.create') }}">contacter</a>.</p>
</div>
@include('welcome.layout.footer')
