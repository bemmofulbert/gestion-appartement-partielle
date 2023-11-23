<?php

require('../donnees/contratManager.php');

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $contratManager = new ContratManager();

    $contratManager->resilier($id);

    header('Location: ../presentation/traitement/resilierContrat.php');
    exit();
}

?>