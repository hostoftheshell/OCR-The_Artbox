<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>The ArtBox</title>
    </head>
    <body>
        <?php 
        // Inclut le fichier contenant le header
        require_once(__DIR__ . '/includes/header.php'); ?>
        <main>
        <div id="liste-oeuvres">
    <?php
    // Inclut le fichier contenant les données des œuvres
    require_once(__DIR__ . '/includes/oeuvres.php');

    // Vérifie si $oeuvres est défini et non vide
    if (isset($oeuvres) && !empty($oeuvres)) {
        foreach ($oeuvres as $oeuvre) {
            // Sanitize les données des illustrations avant de les utiliser
            $id = isset($oeuvre['id']) ? htmlspecialchars($oeuvre['id']) : '';
            $image = isset($oeuvre['image']) ? htmlspecialchars($oeuvre['image']) : '';
            $title = isset($oeuvre['title']) ? htmlspecialchars($oeuvre['title']) : '';
            $author = isset($oeuvre['author']) ? htmlspecialchars($oeuvre['author']) : '';

            // Affiche des informations pour chaque œuvre d'art
            ?>
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?php echo $id; ?>">
                    <img src="img/<?php echo $image; ?>" alt="<?php echo $title; ?>">
                    <h2><?php echo $title; ?></h2>
                    <p class="description"><?php echo $author; ?></p>
                </a>
            </article>
            <?php
        }
    } else {
        // Gère le cas lorsque $œuvres n'est pas disponible ou vide
        echo "<p>Aucune œuvre disponible pour le moment.</p>";
    }
    ?>
</div>
        </main>
        <?php 
        // Inclut le fichier contenant le footer
        require_once(__DIR__ . '/includes/footer.php'); ?>
    </body>
</html>
