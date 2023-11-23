<?php


include '../donnees/userManager.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $userManager = new UserManager();

    $userManager->delete($id);
}

header('Location: ../presentation/impression/listeUser.php');
exit;

?>