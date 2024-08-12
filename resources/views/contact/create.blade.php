@include('welcome.layout.head')
@include('welcome.layout.nav')
<style>.p-4 {
    height: calc(100% - 425px);
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
    color: #d382ff;
}
#env{color:#94ff90;}
.bg-light {
    background-color: #ffd8d2 !important;
    margin-top: 150px;
}
.text-primary {
    color: #d382ff;
}h4, h1 {
    text-shadow: 2px 2px 4px rgb(172 255 165 / 70%);
    text-align: center;
    color: #d382ff;
}
element.style {
}
.form-control:disabled, .form-control:read-only {
    background-color: #d382ff;
    opacity: 1;
    color: white;
}
</style>
<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Nous Contacter</h1>
                        <p class="mb-4">Pour toute question, n'hésitez pas à nous envoyer un message via le formulaire ci-dessous.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                <div class="h-100 rounded">
    <!-- Carte de localisation -->
    <iframe class="rounded w-100" 
    style="height: 400px;" 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17495.527096893453!2d10.7149335!3d34.8078717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002cda1486c695%3A0x7bf1e405d1eed969!2sRP57%2B4W8%2C%20Sfax!5e0!3m2!1sen!2sus!4v1698251136708!5m2!1sen!2sus" 
    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

                </div>
                <div class="col-lg-7">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Votre Nom" required>
                        <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Votre Email" required>
                        <input type="tel" name="phone" class="w-100 form-control border-0 py-3 mb-4" placeholder="Votre Numéro de Téléphone (optionnel)">
                        <select name="subject" class="w-100 form-control border-0 py-3 mb-4" required>
                            <option value="" disabled selected>Choisissez un sujet</option>
                            <option value="retour">Retour</option>
                            <option value="echange">Échange</option>
                            <option value="demande_creation_compte">Demande de Création de Compte</option>
                            <option value="commande">Commande</option>
                            <option value="soutien">Soutien Technique</option>
                            <option value="autre">Autre</option>
                        </select>
                        <textarea name="message" class="w-100 form-control border-0 mb-4" rows="5" placeholder="Votre Message" required></textarea>
                        <button id="env" class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="col-lg-5">
                                        <!-- Section Réseaux Sociaux -->
<div class="d-flex p-4 rounded mb-4 bg-white">
    <i class="fas fa-share-alt fa-2x text-primary me-4"></i>
    <div>
        <h4>Réseaux Sociaux</h4>
        <div class="d-flex">
            <a href="https://www.facebook.com/FimoChic" class="text-primary me-3" target="_blank">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://www.instagram.com/FimoChic" class="text-primary me-3" target="_blank">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="https://www.snapchat.com/add/FimoChic" class="text-primary me-3" target="_blank">
                <i class="fab fa-snapchat-ghost fa-2x"></i>
            </a>
            <a href="https://www.tiktok.com/@FimoChic" class="text-primary" target="_blank">
                <i class="fab fa-tiktok fa-2x"></i>
            </a>
        </div>
    </div>
</div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Adresse</h4>
                            <p class="mb-2">Bouzayen 8klm , Sfax, Tunisie</p>
                            </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Email</h4>
                            <p class="mb-2">fimochic@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Téléphone</h4>
                            <p class="mb-2">(+216) 25141113</p>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


@include('welcome.layout.footer')
