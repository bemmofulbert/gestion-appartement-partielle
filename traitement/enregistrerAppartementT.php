<?php

require('../donnees/appartementManager.php');



if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

    $numLocation = $_POST['numLocation'];
    $categorie = $_POST['categorie'];
    $type = $_POST['type'];
    $idProprietaire = $_POST['idProprietaire'];
    $equipement = $_POST['equipement'];
    $nbPersonnes = $_POST['nbPersonnes'];
    $adresseLocation = $_POST['adresseLocation'];
    $idTarif = $_POST['idTarif'];

    $target_dir = 'imageUpload/';
    $target_file = $target_dir . basename($_FILES['photo']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $nomFichier = $_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

    $appartement = new Appartement();

    $appartement->setNumLocation($numLocation);
    $appartement->setCategorie($categorie);
    $appartement->setTypeAppartement($type);
    $appartement->setNumProprietaire($idProprietaire);
    $appartement->setEquipement($equipement);
    $appartement->setNbPersonnes($nbPersonnes);
    $appartement->setAdresseLocation($adresseLocation);
    $appartement->setCodeTarif($idTarif);
    $appartement->setPhoto($nomFichier);

    $appartementManager = new AppartementManager();

    $appartementManager->add($appartement);

}

header('Location: ../presentation/structure/enregistrerAppartement.php');
exit();

?>