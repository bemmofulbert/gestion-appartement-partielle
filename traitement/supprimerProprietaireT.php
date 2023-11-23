<?php


include '../donnees/proprietaireManager.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $proprietaireManager = new ProprietaireManager();

    $proprietaireManager->delete($id);
}

header('Location: ../presentation/impression/listeProprietaire.php');
exit;

?>