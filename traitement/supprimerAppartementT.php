<?php


include '../donnees/appartementManager.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $appartementManager = new AppartementManager();

    $appartementManager->delete($id);
}

header('Location: ../presentation/impression/listeLocations.php');
exit;

?>