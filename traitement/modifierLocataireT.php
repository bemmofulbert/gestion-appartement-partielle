<?php

require('../donnees/locataireManager.php');

$locataireManager = new LocataireManager();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $locataire = $locataireManager->getUnique($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

        //$numLocataire = $_POST['numLocataire'];
        $nom = $_POST['nomLocataire'];
        $prenom = $_POST['prenomLocataire'];
        $adresse1 = $_POST['adresse1Locataire'];
        $adresse2 = $_POST['adresse2Locataire'];
        $codePostal = $_POST['codePostalLocataire'];
        $ville = $_POST['villeLocataire'];
        $numTel1 = $_POST['numTel1Locataire'];
        $numTel2 = $_POST['numTel2Locataire'];
        $email = $_POST['emailLocataire'];
    
        //$locataire->setNumLocataire($numLocataire);
        $locataire->setNomLocataire($nom);
        $locataire->setPrenomLocataire($prenom);
        $locataire->setAdresse1Locataire($adresse1);
        $locataire->setAdresse2Locataire($adresse2);
        $locataire->setCodePostalLocataire($codePostal);
        $locataire->setVilleLocataire($ville);
        $locataire->setNumTel1Locataire($numTel1);
        $locataire->setNumTel2Locataire($numTel2);
        $locataire->setEmailLocataire($email);
    
        $locataireManager = new LocataireManager();
    
        $locataireManager->update($locataire);
    
        header('Location: ../presentation/impression/listeLocataire.php');
        exit();
    
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../presentation/style.css">
    <title>Modifier un Locataire</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br>
    <div id="container">
        <form method="POST" action=#>
			<div class="headerform"><h1>Modifier un locataire</h1></div>
            <label for="nomLocataire">Nom</label>
            <input type="text" name="nomLocataire" id="nomLocataire" placeholder="Nom" value="<?php echo $locataire->getNomLocataire();?>">
            <br>
            <div class="row">
                <div class="col1">
                    <label for="prenomLocataire">Prenom</label>
                    <input type="text" name="prenomLocataire" id="prenomLocataire" placeholder="Prenom" value="<?php echo $locataire->getPrenomLocataire();?>">
                    <br>
                    <label for="adresse1Locataire">Adresse 1</label>
                    <input type="text" name="adresse1Locataire" id="adresse1Locataire" placeholder="Adresse 1" value="<?php echo $locataire->getAdresse1Locataire();?>">
                    <br>
                    <label for="adresse2Locataire">Adresse 2</label>
                    <input type="text" name="adresse2Locataire" id="adresse2Locataire" placeholder="Adresse 2" value="<?php echo $locataire->getAdresse2Locataire();?>">
                    <br>
                    <label for="codePostalLocataire">Code postal</label>
                    <input type="text" name="codePostalLocataire" id="codePostalLocataire" placeholder="Code postal" value="<?php echo $locataire->getCodePostalLocataire();?>">
                    <br>
                </div>
                <div class="col2">
                    <label for="villeLocataire">Ville</label>
                    <input type="text" name="villeLocataire" id="villeLocataire" placeholder="Ville" value="<?php echo $locataire->getVilleLocataire();?>">
                    <br>
                    <label for="numTel1Locataire">Numéro de téléphone 1</label>
                    <input type="number" name="numTel1Locataire" id="numTel1Locataire" placeholder="Numéro de téléphone 1" value="<?php echo $locataire->getNumTel1Locataire();?>">
                    <br>
                    <label for="numTel2Locataire">Numéro de téléphone 2</label>
                    <input type="number" name="numTel2Locataire" id="numTel2Locataire" placeholder="Numéro de téléphone 2" value="<?php echo $locataire->getNumTel2Locataire();?>">
                    <br>
                    <label for="emailLocataire">Email</label>
                    <input type="text" name="emailLocataire" id="emailLocataire" placeholder="Email" value="<?php echo $locataire->getEmailLocataire();?>">
                    <br>
                </div>
            </div>
            <div class="button">
            <button type="submit">Enregistrer</button>
			<button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</body>
</html>