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

        <div class="image-" >
            <img src="{{ asset('img/logo.jpg') }}" width="200px"alt="Notre Histoire">
        </div>

        <h2>Notre Histoire et Notre Mission</h2>
        <div class="text-section">
    <p>
        {{ $parametres['notrehistoire'] ?? 'L\'idée de Fimo Chic a germé lorsque mon amie, une grande amatrice de boucles d\'oreilles, fêtait son anniversaire. Désireuse de lui offrir un cadeau unique et personnel, j\'ai décidé de créer des boucles d\'oreilles faites à la main. Ce cadeau a tellement plu que j\'ai réalisé qu\'il y avait une véritable demande pour des bijoux personnalisés et faits main. C\'est ainsi qu\'est né Fimo Chic. Notre mission est de proposer des bijoux de qualité, originaux et personnalisés, qui apportent une touche spéciale à chaque moment de votre vie. Nous nous engageons à offrir des produits uniques qui racontent votre histoire.' }}
    </p>
</div>

        <div class="image-">
        <img src="{{ $parametres['notrehistoireimage'] ?? 'img/logo.jpg' }}" width="200px" alt="Notre Mission">
        </div>

        <h2>À Propos du Fondateur</h2>
        <div class="team-section">
            <div class="team-member animate__animated animate__fadeInLeft">
                <img src="{{ $parametres['Fondateurimage'] ?? 'img/logo.jpg' }}" alt="Ghofrane Trikki">
                <div>
                <div class="text-section">
    <p>
        {{ $parametres['Fondateurp1'] ?? '        ' }}
        <br/>
        {{ $parametres['Fondateurp2'] ?? '                ' }}
        <br/>

        {{ $parametres['Fondateurp3'] ?? '' }}
        <br/>

        {{ $parametres['Fondateurp4'] ?? '' }}
        <br/>

        {{ $parametres['Fondateurp5'] ?? '' }}
        {{ $parametres['Fondateurp6'] ?? '' }}

             
         
                  Mon stage chez Exadev, où j'ai développé un site web pour Fimo Chic, a été une expérience enrichissante. J'ai appris à combiner mes compétences techniques et ma passion artistique pour créer des bijoux uniques et personnalisés.
            
    </p>
</div>
                </div>
            </div>
        </div>

        <h2>Nos Offres Uniques</h2>
        <p>
            <strong>Personnalisation Boucles et Cadeaux</strong><br>
            {{ $parametres['Personnalisation Boucles et Cadeaux p1'] ?? '' }}
            {{ $parametres['Personnalisation Boucles et Cadeaux p2'] ?? '' }}
            <div class="image-">
        <img src="{{ $parametres['Personnalisation Boucles et Cadeaux image'] ?? 'img/logo.jpg' }}" width="200px" alt="Notre Mission">
        </div>

        </p>
        <p>
            <strong>Section Modernité</strong><br>
            {{ $parametres['Modernitép1'] ?? '' }}
            {{ $parametres['Modernitép2'] ?? '' }}
            <div class="image-">
        <img src="{{ $parametres['Modernité image'] ?? 'img/logo.jpg' }}" width="200px" alt="Notre Mission">
        </div>        </p>
        <p>
            <strong>Expérience Client Unique</strong><br>
            {{ $parametres['expclientuniquep1'] ?? '' }}
            {{ $parametres['expclientuniquep2'] ?? '' }}
            <div class="image-">
        <img src="{{ $parametres['expclientunique image'] ?? 'img/logo.jpg' }}" width="200px" alt="Notre Mission">
        </div>       
        </p>

   
        <h2>Technologie et Innovation</h2>
        <p>
            Nous intégrons la technologie dans chaque aspect de notre entreprise. Les codes QR permettent une interaction directe avec nos produits, vous offrant une visualisation en temps réel de vos personnalisations. C'est cette innovation qui nous distingue et améliore l'expérience client.
        </p>

  

        {{ $parametres['techetinnop1'] ?? '' }}
            {{ $parametres['techetinnop2'] ?? '' }}
            <div class="image-">
        <img src="{{ $parametres['techetinno image'] ?? 'img/logo.jpg' }}" width="200px" alt="Notre Mission">
        </div>        
     
    
    <h2>Événements Spéciaux</h2>
        <div class="special-events animate__animated animate__fadeInUp">
        {{ $parametres['evet1'] ?? '' }}

           

        <video autoplay loop muted class="w-100 h-100 " style="object-fit: cover;">
    <!-- Assurez-vous que la clé 'vid' est correcte et que le chemin est valide -->
    <source src="{{ $parametres['videvt1'] ?? '' }}" type="video/mp4">
    Votre navigateur ne prend pas en charge la vidéo.
</video>

       
{{ $parametres['evet2'] ?? '' }}

           

<video autoplay loop muted class="w-100 h-100 " style="object-fit: cover;">
<!-- Assurez-vous que la clé 'vid' est correcte et que le chemin est valide -->
<source src="{{ $parametres['videvt2'] ?? '' }}" type="video/mp4">
Votre navigateur ne prend pas en charge la vidéo.
</video>



{{ $parametres['evet3'] ?? '' }}

           

<video autoplay loop muted class="w-100 h-100 " style="object-fit: cover;">
<!-- Assurez-vous que la clé 'vid' est correcte et que le chemin est valide -->
<source src="{{ $parametres['videevt3'] ?? '' }}" type="video/mp4">
Votre navigateur ne prend pas en charge la vidéo.
</video>




{{ $parametres['evet4'] ?? '' }}

           

<video autoplay loop muted class="w-100 h-100 " style="object-fit: cover;">
<!-- Assurez-vous que la clé 'vid' est correcte et que le chemin est valide -->
<source src="{{ $parametres['videevt4'] ?? '' }}" type="video/mp4">
Votre navigateur ne prend pas en charge la vidéo.
</video>



{{ $parametres['evet5'] ?? '' }}

           

<video autoplay loop muted class="w-100 h-100 " style="object-fit: cover;">
<!-- Assurez-vous que la clé 'vid' est correcte et que le chemin est valide -->
<source src="{{ $parametres['videevt5'] ?? '' }}" type="video/mp4">
Votre navigateur ne prend pas en charge la vidéo.
</video>

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
