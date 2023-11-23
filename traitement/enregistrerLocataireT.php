<?php

require('../donnees/locataireManager.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

    $numLocataire = $_POST['numLocataire'];
    $nom = $_POST['nomLocataire'];
    $prenom = $_POST['prenomLocataire'];
    $adresse1 = $_POST['adresse1Locataire'];
    $adresse2 = $_POST['adresse2Locataire'];
    $codePostal = $_POST['codePostalLocataire'];
    $ville = $_POST['villeLocataire'];
    $numTel1 = $_POST['numTel1Locataire'];
    $numTel2 = $_POST['numTel2Locataire'];
    $email = $_POST['emailLocataire'];

    /*$Locataire = new Locataire($numLocataire, $nom, $prenom, $adresse1, $adresse2, $codePostal, $ville, 
    $numTel1, $numTel2, $CAcumule, $email);*/

    $locataire = new Locataire();

    $locataire->setNumLocataire($numLocataire);
    $locataire->setNomLocataire($nom);
    $locataire->setPrenomLocataire($prenom);
    $locataire->setAdresse1Locataire($adresse1);
    $locataire->setAdresse2Locataire($adresse2);
    $locataire->setCodePostalLocataire($codePostal);
    $locataire->setVilleLocataire($ville);
    $locataire->setNumTel1Locataire($numTel1);
    $locataire->setNumTel2Locataire($numTel2);
    $locataire->setEmailLocataire($email);

    $LocataireManager = new LocataireManager();

    $LocataireManager->add($locataire);

}

header('Location: ../presentation/structure/enregistrerLocataire.php');
exit();

?>