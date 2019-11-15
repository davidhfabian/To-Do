<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=david_todo', 'root', '52752');
    //echo 'Connected database :)';
} catch (PDOException $e) {
    echo 'Error :( : ' . $e->getMessage();
}
