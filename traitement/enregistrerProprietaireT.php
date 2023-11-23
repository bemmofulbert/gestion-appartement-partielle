<?php

require('../donnees/proprietaireManager.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

    $numProprietaire = $_POST['numProprietaire'];
    $nom = $_POST['nomProprietaire'];
    $prenom = $_POST['prenomProprietaire'];
    $adresse1 = $_POST['adresse1Proprietaire'];
    $adresse2 = $_POST['adresse2Proprietaire'];
    $codePostal = $_POST['codePostalProprietaire'];
    $ville = $_POST['villeProprietaire'];
    $numTel1 = $_POST['numTel1Proprietaire'];
    $numTel2 = $_POST['numTel2Proprietaire'];
    $CAcumule = $_POST['CAcumule'];
    $email = $_POST['emailProprietaire'];

    $proprietaire = new Proprietaire();

    $proprietaire->setNumProprietaire($numProprietaire);
    $proprietaire->setNom($nom);
    $proprietaire->setPrenom($prenom);
    $proprietaire->setAdresse1($adresse1);
    $proprietaire->setAdresse2($adresse2);
    $proprietaire->setCodePostal($codePostal);
    $proprietaire->setVille($ville);
    $proprietaire->setNumTel1($numTel1);
    $proprietaire->setNumTel2($numTel2);
    $proprietaire->setCAcumule($CAcumule);
    $proprietaire->setEmail($email);

    $proprietaireManager = new ProprietaireManager();

    $proprietaireManager->add($proprietaire);

}

header('Location: ../presentation/structure/enregistrerProprietaire.php');
exit();

?>