<?php


require_once('../../donnees/locataireManager.php');

$locataireManager = new LocataireManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $locataire = $locataireManager->getUnique($id);

    if($locataire == null) $listLocataire = null;
    else $listLocataire = [$locataire];
}
else{
    $listLocataire = $locataireManager->getList();
}

?>