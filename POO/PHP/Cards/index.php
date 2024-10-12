<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .bgBlue {
            background-color: blue;
        }

        .bgRed {
            background-color: red;
        }
    </style>
</head>
<?php
include_once 'Planete.php';
include_once 'Card.php';
include_once 'Systeme.php';
?>

<body>
    <div class="row mt-5">
        <?php
        $systemeSolaire = new Systeme("Systeme Solaire");
        $systemeSolaire->addPlanete(new Planete("Terre", "Description de la terre", "https://upload.wikimedia.org/wikipedia/commons/c/cb/The_Blue_Marble_%28remastered%29.jpg"));
        $systemeSolaire->addPlanete(new Planete("Mars", "Mars (prononcé en français : /maʁs/) est la quatrième planète du Système solaire par ordre croissant de la distance au Soleil et la deuxième par ordre croissant de la taille et de la masse. Son éloignement au Soleil est compris entre 1,381 et 1,666 au (206,6 à 249,2 millions de kilomètres), elle a une période orbitale de 669,58 jours martiens (686,71 jours ou 1,88 année terrestre).", "https://upload.wikimedia.org/wikipedia/commons/3/36/Mars_Valles_Marineris_EDIT.jpg"));
        $systemeSolaire->addPlanete(new Planete("Venus", "Vénus est la deuxième planète du Système solaire par ordre d'éloignement au Soleil, et la sixième plus grosse aussi bien par la masse que le diamètre.", "https://upload.wikimedia.org/wikipedia/commons/e/e5/Venus-real_color.jpg"));
        $systemeSolaire->addPlanete(new Planete("Saturne", "Saturne est la sixième planète du Système solaire par ordre d'éloignement au Soleil, et la deuxième plus grande par la taille et la masse après Jupiter, qui est comme elle une planète géante gazeuse. Son rayon moyen de 58 232 km est environ neuf fois et demi celui de la Terre et sa masse de 568,46 × 1024 kg est 95 fois plus grande. Orbitant en moyenne à environ 1,4 milliard de kilomètres du Soleil (9,5 unités astronomiques), sa période de révolution vaut un peu moins de 30 années terrestres tandis que sa période de rotation est estimée à 10 h 33 min.", "https://upload.wikimedia.org/wikipedia/commons/c/c7/Saturn_during_Equinox.jpg"));
        $systemeSolaire->afficheSysteme();
        $systemeSolaire->afficheSystemeCaroussel();
        ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>