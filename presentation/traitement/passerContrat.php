<?php

include('../../traitement/listeLocataireT.php');
include('../../traitement/listeAppartementT.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Passer un Contrat</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/passerContratT.php">
			<div class="headerform"><h1>Enregistrer un Contrat</h1></div>
            <label for="numContrat">Id du Contrat</label>
            <input type="number" name="numContrat" id="numContrat" placeholder="Id du Contrat">
            <br>
            <div class="row">
                <div class="col1">
                    <label for="etat">Etat</label>
                    <select name="etat" id="etat">
                        <option value="">Etat</option>
                        <option value="résiler">Résilier</option>
                        <option value="en cours">En cours</option>
                        <option value="expiré">Expiré</option>
                    </select>
                    <br>
                    <label for="dateCreation">Date de création</label>
                    <input type="date" name="dateCreation" id="dateCreation" placeholder="Date de création">
                    <br>
                    <label for="dateDebut">date de début</label>
                    <input type="date" name="dateDebut" id="dateDebut" placeholder="date de début">
                    <br>
                </div>
                <div class="col2">
                    <label for="dateFin">Date de fin</label>
                    <input type="date" name="dateFin" id="dateFin" placeholder="Date de fin">
                    <br>
                    <label for="numLocation">Location</label>
                    <select name="numLocation" id="numLocation">
                        <option value="">Location</option>
                        <?php foreach ($listAppartement as $appartement): ?>
                            <option value="<?php echo $appartement->getNumLocation(); ?>">
                                <?php echo 'Categorie : ' .$appartement->getCategorie() . ' ,Type :  ' . $appartement->getTypeAppartement(); ?>
                                </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="numLocataire">Locataire</label>
                    <select name="numLocataire" id="numLocataire">
                        <option value="">Locataire</option>
                        <?php foreach ($listLocataire as $locataire): ?>
                            <option value="<?php echo $locataire->getNumLocataire(); ?>">
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