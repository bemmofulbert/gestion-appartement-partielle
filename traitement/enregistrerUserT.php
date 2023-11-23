<?php

require_once('../donnees/userManager.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

    $user = new User($_POST);
    echo $user->getIdUser();

    $userManager = new UserManager();
    $userManager->add($user);
}
header('Location: ../presentation/structure/enregistrerUser.php');
exit();

?>