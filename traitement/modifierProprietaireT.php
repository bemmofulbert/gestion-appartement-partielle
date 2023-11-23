<?php

require('../donnees/proprietaireManager.php');

$proprietaireManager = new ProprietaireManager();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $proprietaire = $proprietaireManager->getUnique($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

        //$numProprietaire = $_POST['numProprietaire'];
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
    
        //$proprietaire->setNumProprietaire($numProprietaire);
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
    
        $proprietaireManager->update($proprietaire);
    
        header('Location: ../presentation/impression/listeProprietaire.php');
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
    <title>Modifier un Propriétaire</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br>
    <div id="container">
        <form method="POST" action=#>
			<div class="headerform"><h1>Modifier un propriétaire</h1></div>
            <br>
            <div class="row">
                <div class="col1">
                    <label for="nomProprietaire">Nom</label>
                    <input type="text" name="nomProprietaire" id="nomProprietaire" placeholder="Nom" value="<?php echo $proprietaire->getNom();?>">
                    <br>
                    <label for="prenomProprietaire">Prenom</label>
                    <input type="text" name="prenomProprietaire" id="prenomProprietaire" placeholder="Prenom" value="<?php echo $proprietaire->getPrenom();?>">
                    <br>
                    <label for="adresse1Proprietaire">Adresse 1</label>
                    <input type="text" name="adresse1Proprietaire" id="adresse1Proprietaire" placeholder="Adresse 1" value="<?php echo $proprietaire->getAdresse1();?>">
                    <br>
                    <label for="adresse2Proprietaire">Adresse 2</label>
                    <input type="text" name="adresse2Proprietaire" id="adresse2Proprietaire" placeholder="Adresse 2" value="<?php echo $proprietaire->getAdresse2();?>">
                    <br>
                    <label for="CAcumule">CA cumulé</label>
                    <input type="number" name="CAcumule" id="CAcumule" placeholder="CA cumulé" value="<?php echo $proprietaire->getCAcumule();?>">
                    <br>
                </div>
                <div class="col2">
                    <label for="codePostalProprietaire">Code postal</label>
                    <input type="text" name="codePostalProprietaire" id="codePostalProprietaire" placeholder="Code postal" value="<?php echo $proprietaire->getCodePostal();?>">
                    <br>
                    <label for="villeProprietaire">Ville</label>
                    <input type="text" name="villeProprietaire" id="villeProprietaire" placeholder="Ville" value="<?php echo $proprietaire->getVille();?>">
                    <br>
                    <label for="numTel1Proprietaire">Numéro de téléphone 1</label>
                    <input type="number" name="numTel1Proprietaire" id="numTel1Proprietaire" placeholder="Numéro de téléphone 1" value="<?php echo $proprietaire->getNumTel1();?>">
                    <br>
                    <label for="numTel2Proprietaire">Numéro de téléphone 2</label>
                    <input type="number" name="numTel2Proprietaire" id="numTel2Proprietaire" placeholder="Numéro de téléphone 2" value="<?php echo $proprietaire->getNumTel2();?>">
                    <br>
                    <label for="emailProprietaire">Email</label>
                    <input type="text" name="emailProprietaire" id="emailProprietaire" placeholder="Email" value="<?php echo $proprietaire->getEmail();?>">
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