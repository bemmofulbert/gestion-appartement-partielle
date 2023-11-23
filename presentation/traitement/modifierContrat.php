<?php

include('../../traitement/listeContratT.php');
include('../../donnees/appartementManager.php');
include('../../donnees/locataireManager.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../impression/styleImpression.css">
    <title>Modifier un Contrat</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <br>
    <div class="headerImpression">
        <form class="search-form" action="#" method="get">
            <input class="search-input" type="text" name="id" id="id" placeholder="Recherche...">
            <button class="search-button" type="submit">Rechercher</button>
        </form>
    </div>
    <br>
    <br>
    <center><h1><b>Liste des contrats</b></h1></center>
    <div class="table">
        <table id="tableau" >
            <thead>
                <tr>
                    <th>Id Contrat</th>
                    <th>Etat</th>
                    <th>Date de création</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Location</th>
                    <th>Locataire</th>
                    <th>Action 1</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listContrat as $contrat): ?>
                    <tr>
                        <td>
                            <?php echo $contrat->getNumContrat(); ?>
                        </td>
                        <td>
                            <?php echo $contrat->getEtat(); ?>
                        </td>
                        <td>
                            <?php echo $contrat->getDateCreation(); ?>
                        </td>
                        <td>
                            <?php echo $contrat->getDateDebut(); ?>
                        </td>
                        <td>
                            <?php echo $contrat->getDateFin(); ?>
                        </td>
                        <td>
                            <?php
                            $numLocation = $contrat->getNumLocation();
                            $appartementManager = new AppartementManager();
                            $appartement = $appartementManager->getUnique($numLocation);
                            echo 'Categorie : ' . $appartement->getCategorie() . ' ,Type :  ' . $appartement->getTypeAppartement();
                            ?>
                        </td>
                        <td>
                            <?php
                            $numLocataire = $contrat->getNumLocataire();
                            $locataireManager = new LocataireManager();
                            $locataire = $locataireManager->getUnique($numLocataire);
                            echo $locataire->getNomLocataire() . ' ' . $locataire->getPrenomLocataire();
                            ?>
                        </td>
                        <td>
                            <a href="../../traitement/modifierContratT.php?id=<?php echo $contrat->getNumContrat(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette news ?')">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>