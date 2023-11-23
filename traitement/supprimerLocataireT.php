<?php

include '../donnees/locataireManager.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $locataireManager = new LocataireManager();

    $locataireManager->delete($id);
}

header('Location: ../presentation/impression/listeLocataire.php');
exit;

?>