<?php


require_once('../../donnees/contratManager.php');

$contratManager = new ContratManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contrat = $contratManager->getUnique($id);
    if($contrat == null) $listContrat = null;
    else $listContrat = [$contrat];
}
else{
    $listContrat = $contratManager->getList();
}

?>