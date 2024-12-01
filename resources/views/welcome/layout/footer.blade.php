<!-- Footer Start -->
<script>// Afficher le bouton "Retour en haut" lorsque l'utilisateur fait défiler la page
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('.back-to-top').addClass('show');
    } else {
        $('.back-to-top').removeClass('show');
    }
});

// Lorsque l'utilisateur clique sur le bouton, revenir en haut de la page
$('.back-to-top').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 500);
    return false;
});
</script>
<style>/* Style du footer */
footer {
    background-color: #333;
    color: #fff;
    padding: 60px 0;
}

footer .text-light {
    color: #f1f1f1 !important;
}

footer .text-white-50 {
    color: rgba(255, 255, 255, 0.7) !important;
}

footer h4, footer h5 {
    margin-bottom: 15px;
    font-weight: 600;
    font-size: 1.3rem;
}

footer ul {
    padding-left: 0;
    list-style: none;
}

footer ul li {
    margin-bottom: 10px;
}

footer ul li a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 1rem;
    transition: color 0.3s;
}

footer ul li a:hover {
    color: #f1f1f1;
}

footer .fab {
    font-size: 1.5rem;
    color: #fff;
    margin-right: 10px;
    transition: color 0.3s;
}

footer .fab:hover {
    color: #f1f1f1;
}
.bg-dark {background-color: #880e4f!important;}

/* Style du copyright */
.copyright {
    background-color: #222;
    color: #ccc;
    padding: 20px 0;
}

.copyright a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.3s;
}

.copyright a:hover {
    color: #fff;
}

.copyright .fas {
    font-size: 18px;
    color: #fff;
}

.copyright .border-bottom {
    border-bottom: 2px solid #fff;
    transition: border-color 0.3s;
}

.copyright .border-bottom:hover {
    border-color: #ccc;
}

/* Back to top button */
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 50%;
    font-size: 18px;
    display: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s;
}

.back-to-top:hover {
    background-color: #0056b3 !important;
}

.back-to-top i {
    color: #fff;
}

.back-to-top.show {
    display: block;
}
</style>
<footer class="container-fluid bg-dark text-white py-5 mt-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h4 class="text-light mb-3">Fimo Chic</h4>
                <p class="text-white-50">Créations artisanales uniques et personnalisées.</p>
                <p class="text-white-50">&copy; 2024 Fimo Chic. Tous droits réservés.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-light mb-3">Liens Utiles</h5>
                <ul class="list-unstyled">
                    <li><a class="text-white-50" href="#">Accueil</a></li>
                    <li><a class="text-white-50" href="#">À propos</a></li>
                    <li><a class="text-white-50" href="#">Boutique</a></li>
                    <li><a class="text-white-50" href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-light mb-3">Suivez-nous</h5>
                <div>
                    <a class="text-white-50 me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white-50 me-3" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="text-white-50 me-3" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="text-white-50" href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Fimochic</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Triki ghofrane</a> eleve ingenieure a <a class="border-bottom" href="https://themewagon.com">iit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/maintamp.js"></script>
    </body>

</html>