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
        // Include the file containing header
        require_once(__DIR__ . '/includes/header.php'); ?>
        <main>
        <div id="liste-oeuvres">
    <?php
    // Include the file containing artwork data
    require_once(__DIR__ . '/includes/oeuvres.php');

    // Check if $oeuvres is set and not empty
    if (isset($oeuvres) && !empty($oeuvres)) {
        foreach ($oeuvres as $oeuvre) {
            // Sanitize artwork data before using it
            $id = isset($oeuvre['id']) ? htmlspecialchars($oeuvre['id']) : '';
            $image = isset($oeuvre['image']) ? htmlspecialchars($oeuvre['image']) : '';
            $title = isset($oeuvre['title']) ? htmlspecialchars($oeuvre['title']) : '';
            $author = isset($oeuvre['author']) ? htmlspecialchars($oeuvre['author']) : '';

            // Output HTML for each artwork
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
        // Handle case when $oeuvres is not available or empty
        echo "<p>Aucune œuvre disponible pour le moment.</p>";
    }
    ?>
</div>
        </main>
        <?php 
        // Include the file containing header
        require_once(__DIR__ . '/includes/footer.php'); ?>
    </body>
</html>
