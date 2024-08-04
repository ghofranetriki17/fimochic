@include('welcome.layout.head')
@include('welcome.layout.nav')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos de Fimo Chic</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            margin-top: 60x;
            text-align: center;
            color: #d4a5a5;
        }
        p {
            line-height: 1.6;
            color: #555;
        }
        .image-section, .team-section, .testimonials-section {
            margin: 50px 0;
        }
        .image-section img, .team-section img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .testimonial {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue chez Fimo Chic</h1>
        <p>
            Fimo Chic est née d'une passion pour la créativité et l'originalité. Chaque bijou est conçu avec amour et minutie, reflétant la personnalité unique de chaque client. Découvrez notre histoire, notre mission et ce qui rend nos créations si spéciales.
        </p>

        <div class="image-section">
            <img src="{{ asset('images/fimo_chic_story.jpg') }}" alt="Notre Histoire">
        </div>

        <h2>Notre Histoire et Notre Mission</h2>
        <p>
            L'idée de Fimo Chic a germé lorsque mon amie, une grande amatrice de boucles d'oreilles, fêtait son anniversaire. Désireuse de lui offrir un cadeau unique et personnel, j'ai décidé de créer des boucles d'oreilles faites à la main. Ce cadeau a tellement plu que j'ai réalisé qu'il y avait une véritable demande pour des bijoux personnalisés et faits main. C'est ainsi qu'est né Fimo Chic.
            Notre mission est de proposer des bijoux de qualité, originaux et personnalisés, qui apportent une touche spéciale à chaque moment de votre vie. Nous nous engageons à offrir des produits uniques qui racontent votre histoire.
        </p>

        <div class="image-section">
            <img src="{{ asset('images/fimo_chic_mission.jpg') }}" alt="Notre Mission">
        </div>

        <h2>À Propos du Fondateur</h2>
        <div class="team-section">
            <div class="team-member animate__animated animate__fadeInLeft">
                <img src="{{ asset('images/ghofrane_trikki.jpg') }}" alt="Ghofrane Trikki">
                <div>
                    <p>
                        Bonjour, je m'appelle Ghofrane Trikki, j'ai 22 ans et je suis étudiante en deuxième année d'ingénierie à l'Institut International de Technologie de l'Université Privée Nord-Américaine.
                    </p>
                    <p>
                        Mon parcours académique a été une véritable aventure. Diplômée en 2021 avec mention très bien en sciences expérimentales, j'ai d'abord envisagé une carrière en médecine. Cependant, la vie m'a orientée vers l'informatique, un domaine qui m'a rapidement passionnée. Après deux années intensives à l'école préparatoire de Sfax-les-Pays, j'ai réussi le concours international d'entrée aux écoles d'ingénieurs et me suis finalement tournée vers la technologie et l'innovation à l'Institut International de Technologie.
                    </p>
                    <p>
                        Pendant ma première année, j'ai réalisé plusieurs projets passionnants, allant d'un site web de portfolio personnel à un système de gestion de transport public utilisant la technologie Arduino. J'ai également participé à des compétitions où j'ai remporté plusieurs prix, notamment en théâtre et en slam.
                    </p>
                    <p>
                        Mon stage chez Exadev, où j'ai développé un site web pour Fimo Chic, a été une expérience enrichissante. J'ai appris à combiner mes compétences techniques et ma passion artistique pour créer des bijoux uniques et personnalisés.
                    </p>
                </div>
            </div>
        </div>

        <h2>Nos Offres Uniques</h2>
        <p>
            <strong>Personnalisation Boucles et Cadeaux</strong><br>
            Chez Fimo Chic, nous croyons que chaque bijou doit être aussi unique que la personne qui le porte. C'est pourquoi nous offrons des options de personnalisation pour nos boucles d'oreilles et nos cadeaux. Que vous cherchiez à ajouter une touche personnelle à vos bijoux ou à offrir un cadeau inoubliable, nous avons ce qu'il vous faut.
        </p>
        <p>
            <strong>Section Modernité</strong><br>
            Notre site est à la pointe de la modernité avec des fonctionnalités innovantes telles que les codes QR. Ces codes vous permettent de tester des filtres de nos produits directement sur votre téléphone, pour une expérience d'achat interactive et amusante.
        </p>
        <p>
            <strong>Expérience Client Unique</strong><br>
            Nous savons combien il est important de recevoir un cadeau bien présenté. C'est pourquoi nous offrons une option de commande en boîte cadeau personnalisée, assurant que chaque détail est parfait pour rendre votre expérience avec Fimo Chic inoubliable.
        </p>

        <div class="image-section">
            <img src="{{ asset('images/fimo_chic_customization.jpg') }}" alt="Personnalisation">
        </div>

        <h2>Technologie et Innovation</h2>
        <p>
            Nous intégrons la technologie dans chaque aspect de notre entreprise. Les codes QR permettent une interaction directe avec nos produits, vous offrant une visualisation en temps réel de vos personnalisations. C'est cette innovation qui nous distingue et améliore l'expérience client.
        </p>

  

        <h2>Témoignages et Avis</h2>
        <div class="testimonials-section">
            <div class="testimonial animate__animated animate__fadeInUp">
                <p>"Les bijoux de Fimo Chic sont tout simplement incroyables ! J'ai pu personnaliser chaque détail pour créer une pièce unique." - Marie</p>
            </div>
            <div class="testimonial animate__animated animate__fadeInUp">
                <p>"L'expérience d'achat en ligne est tellement innovante avec les codes QR. J'adore pouvoir voir les filtres sur mon téléphone avant d'acheter." - Julien</p>
            </div>
        </div>

        <h2>Engagement Éthique et Durable</h2>
        <p>
            Chez Fimo Chic, nous nous engageons à des pratiques de production éthiques et respectueuses de l'environnement. Nous utilisons des matériaux durables et nous nous efforçons de minimiser notre empreinte écologique.
        </p>

        <h2>Fêtes et Occasions</h2>
        <p>
            Chez Fimo Chic, nous savons que chaque fête et chaque occasion sont uniques. Que ce soit pour un anniversaire, Noël, la Saint-Valentin, la fête des mères, un mariage, ou simplement pour dire "merci", nous avons des options de personnalisation qui rendront votre cadeau inoubliable. Nos boîtes cadeaux sont décorées avec soin pour correspondre à chaque événement spécial.
        </p>

        <h2>Contact et Suivez-Nous</h2>
        <p>
            Pour toute question ou demande spéciale, n'hésitez pas à nous contacter à [votre adresse email]. Suivez-nous sur les réseaux sociaux pour rester à jour avec nos dernières créations et offres spéciales.
        </p>
    </div>
    <h2>Événements Spéciaux</h2>
        <div class="special-events animate__animated animate__fadeInUp">
            <p>
                Chez Fimo Chic, nous comprenons que certains moments de la vie méritent une attention particulière. Que ce soit pour un anniversaire, un mariage, la fête des mères, Noël ou tout autre événement spécial, nous offrons des options de personnalisation pour rendre chaque cadeau unique et mémorable.
            </p>
            <div class="image-section">
                <img src="{{ asset('images/special_events.jpg') }}" alt="Événements Spéciaux">
            </div>
            <p>
                Nos clients peuvent personnaliser leurs cadeaux en choisissant parmi une variété de designs, de couleurs et de messages spéciaux pour les rendre parfaits pour chaque occasion.
            </p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.team-member').hover(
                function() {
                    $(this).addClass('animate__pulse');
                },
                function() {
                    $(this).removeClass('animate__pulse');
                }
            );
        });
    </script>
</body>
</html>
