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
        <?php 
        // Inclut le fichier contenant les données des œuvres
        include_once(__DIR__ . '/includes/oeuvres.php');
        // Vérifie si l'id est défini dans l'URL et s'il correspond à l'id d'une œuvre d'art.
        if (isset($_GET['id'])) {
            $selected_artwork = null;
            foreach ($oeuvres as $oeuvre) {
                if ($_GET['id'] == $oeuvre['id']) {
                    $selected_artwork = $oeuvre;
                    break; // Quitte la boucle une fois l’œuvre trouvée
                }
            }
            // Affiche des informations détaillées si une œuvre d'art est sélectionnée
            if ($selected_artwork) :
        ?>
                <article id="detail-oeuvre">
                    <div id="img-oeuvre">
                        <img src="img/<?php echo $selected_artwork['image']; ?>" alt="<?php echo $selected_artwork['title']; ?>">
                    </div>
                    <div id="contenu-oeuvre">
                        <h1><?php echo $selected_artwork['title']; ?></h1>
                        <p class="description"><?php echo $selected_artwork['author']; ?></p>
                        <p class="description-complete"><?php echo $selected_artwork['description']; ?></p>
                    </div>
            <?php
            else :
                // Gère le cas où l'id ne correspond à aucune illustration
                echo "<p>Aucune illustration trouvée pour l'ID fourni.</p>";
            endif;
        } else {
            // Gère le cas où l'id n'est pas défini dans l'URL
            echo "<p>Aucune œuvre sélectionnée.</p>";
        }
            ?>
                </article>
    </main>
    <?php 
    // Inclut le fichier contenant le footer
    require_once(__DIR__ . '/includes/footer.php'); ?>
</body>

</html>