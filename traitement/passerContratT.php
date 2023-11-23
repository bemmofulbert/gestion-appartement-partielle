<?php

require('../donnees/contratManager.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

    $numContrat = $_POST['numContrat'];
    $etat = $_POST['etat'];
    $dateCreation = $_POST['dateCreation'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $numLocation = $_POST['numLocation'];
    $numLocataire = $_POST['numLocataire'];

    $contrat = new Contrat();

    $contrat->setNumContrat($numContrat);
    $contrat->setEtat($etat);
    $contrat->setDateCreation($dateCreation);
    $contrat->setDateDebut($dateDebut);
    $contrat->setDateFin($dateFin);
    $contrat->setNumLocation($numLocation);
    $contrat->setNumLocataire($numLocataire);

    $contratManager = new ContratManager();

    $contratManager->add($contrat);

}

header('Location: ../presentation/traitement/passerContrat.php');
exit();

?>