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
    <?php require_once(__DIR__ . '/includes/header.php'); ?>
    <main>
        <?php include_once(__DIR__ . '/includes/oeuvres.php');
        // Check if 'id' is set in the URL and it matches an artwork's id
        if (isset($_GET['id'])) {
            $selected_artwork = null;
            foreach ($oeuvres as $oeuvre) {
                if ($_GET['id'] == $oeuvre['id']) {
                    $selected_artwork = $oeuvre;
                    break; // Exit loop once the artwork is found
                }
            }
            // Display detailed information if an artwork is selected
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
                // Handle case where 'id' does not match any artwork
                echo "<p>Aucune illustration trouvée pour l'ID fourni.</p>";
            endif;
        } else {
            // Handle case where 'id' is not set in the URL
            echo "<p>Aucune œuvre sélectionnée.</p>";
        }
            ?>
                </article>
    </main>
    <?php require_once(__DIR__ . '/includes/footer.php'); ?>
</body>

</html>