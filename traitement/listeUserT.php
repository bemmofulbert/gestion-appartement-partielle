<?php


require_once('../../donnees/userManager.php');

$userManager = new UserManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = $userManager->getUnique($id);
    if($user == null) $listUser = null;
    else $listUser = [$user];
}
else{
    $listUser = $userManager->getList();
}

?>