<?php
    require './includes/class_autoloader.php';

    // Create new gallery object with images directory
    $gallery = new Gallery('./includes/images');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Gallery</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <?php

    echo "<div class='gallery__container'>";
    echo "<img class='gallery__img' src=\"{$gallery->returnImage()}\" alt=\"{$gallery->returnTitle()}\">";
    echo "<p class=\"gallery__title\">{$gallery->returnTitle()}</p>";
    echo "<div class='gallery__links'>";
        echo "<a class='gallery__link gallery__link-first' href=\"index.php?imageID=$gallery->first\">First</a>";
        echo "<a class='gallery__link' href=\"index.php?imageID={$gallery->previousImg()}\">< Previous</a>";
        echo "<a class='gallery__link' href=\"index.php?imageID={$gallery->nextImg()}\">Next ></a>";
        echo "<a class='gallery__link' href=\"index.php?imageID={$gallery->lastImgId()}\">Last</a>";
    ?>
        </div>
    </div>

    
</body>
</html>