<?php

require_once '../../donnees/tarifManager.php';

$tarifManager = new TarifManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $listTarif = $tarifManager->getUnique($id);
}
else{
    $listTarif = $tarifManager->getList();
}

?>