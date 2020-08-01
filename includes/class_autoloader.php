<?php
function classAutoload($className) {
    $path = './classes/';
    $full_path = $path . $className;

    require "$full_path.php";
}

spl_autoload_register('classAutoload');
?>