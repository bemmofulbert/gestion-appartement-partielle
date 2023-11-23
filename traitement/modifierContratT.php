<?php

require('../donnees/contratManager.php');
require('../donnees/appartementManager.php');
require('../donnees/locataireManager.php');

$appartementManager = new AppartementManager();

$locataireManager = new LocataireManager();

$listLocataire = $locataireManager->getList();

$listAppartement = $appartementManager->getList();

$contratManager = new ContratManager();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $contrat = $contratManager->getUnique($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

        $etat = $_POST['etat'];
        $dateCreation = $_POST['dateCreation'];
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];
        $numLocation = $_POST['numLocation'];
        $numLocataire = $_POST['numLocataire'];
    
        $contrat->setEtat($etat);
        $contrat->setDateCreation($dateCreation);
        $contrat->setDateDebut($dateDebut);
        $contrat->setDateFin($dateFin);
        $contrat->setNumLocation($numLocation);
        $contrat->setNumLocataire($numLocataire);
    
        $contratManager->update($contrat);

        header('Location: ../presentation/impression/listeContrat.php');
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
    <title>Modifier un Contrat</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br>
    <div id="container">
        <form method="POST" action=#>
			<div class="headerform"><h1>Modifier un Contrat</h1></div>
            <div class="row">
                <div class="col1">
                    <label for="etat">Etat</label>
                    <select name="etat" id="etat">
                        <option value="">Etat</option>
                        <option value="résiler" <?php if ($contrat->getEtat() == 'résiler') echo 'selected'; ?>>Résilier</option>
                        <option value="en cours" <?php if ($contrat->getEtat() == 'en cours') echo 'selected'; ?>>En cours</option>
                        <option value="expiré" <?php if ($contrat->getEtat() == 'expiré"') echo 'selected'; ?>>Expiré</option>
                    </select>
                    <br>
                    <label for="dateCreation">Date de création</label>
                    <input type="date" name="dateCreation" id="dateCreation" placeholder="Date de création" value="<?php echo $contrat->getDateCreation();?>">
                    <br>
                    <label for="dateDebut">date de début</label>
                    <input type="date" name="dateDebut" id="dateDebut" placeholder="date de début" value="<?php echo $contrat->getDateDebut();?>">
                    <br>
                </div>
                <div class="col2">
                    <label for="dateFin">Date de fin</label>
                    <input type="date" name="dateFin" id="dateFin" placeholder="Date de fin" value="<?php echo $contrat->getDateFin();?>">
                    <br>
                    <label for="numLocation">Location</label>
                    <select name="numLocation" id="numLocation">
                        <option value="">Location</option>
                        <?php foreach ($listAppartement as $appartement): ?>
                            <?php $selected = ($contrat->getNumLocation() == $appartement->getNumLocation()) ? 'selected' : ''; ?>
                            <option value="<?php echo $appartement->getNumLocation();?>" <?php echo $selected; ?>>
                            <?php echo 'Categorie : ' .$appartement->getCategorie() . ' ,Type :  ' . $appartement->getTypeAppartement(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="numLocataire">Locataire</label>
                    <select name="numLocataire" id="numLocataire">
                        <option value="">Locataire</option>
                        <?php foreach ($listLocataire as $locataire): ?>
                            <?php $selected = ($contrat->getNumLocataire() == $locataire->getNumLocataire()) ? 'selected' : ''; ?>
                            <option value="<?php echo $locataire->getNumLocataire();?>" <?php echo $selected; ?>>
                            <?php echo $locataire->getNomLocataire() . '  ' . $locataire->getPrenomLocataire(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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