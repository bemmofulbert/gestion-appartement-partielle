<?php

require_once('../../donnees/proprietaireManager.php');

$proprietaireManager = new ProprietaireManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $proprietaire = $proprietaireManager->getUnique($id);

    if($proprietaire == null) $listProprietaire = null;
    else $listProprietaire = [$proprietaire];
}
else{
    $listProprietaire = $proprietaireManager->getList();
}

?>