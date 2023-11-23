<?php

require('../donnees/tarifManager.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    $codeTarif = $_POST['codeTarif'];
    $prixSemHS = $_POST['prixSemHS'];
    $prixSemBS = $_POST['prixSemBS'];

    $tarif = new Tarif();

    $tarif->setCodeTarif($codeTarif);
    $tarif->setPrixSemHS($prixSemHS);
    $tarif->setPrixSemBS($prixSemBS);

    $tarifManager = new TarifManager();
    $tarifManager->add($tarif);
}
header('Location: ../presentation/structure/enregistrerTarif.php');
exit();

?>