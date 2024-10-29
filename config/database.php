<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $mongoClient = new MongoDB\Client("mongodb+srv://Gjuarez:Gabriel_03@gabriel.5u6ne.mongodb.net/?retryWrites=true&w=majority&appName=Gabriel");
    $database = $mongoClient->selectDataBase('Instrumentos');
    $tasksCollection = $database->productos;
?>