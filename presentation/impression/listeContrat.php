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
    <link rel="stylesheet" href="styleImpression.css">
    <title>Liste des Contrats</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <br>
    <div class="headerImpression">
        <button class="btnImpression" onclick="imprimerListe()">Imprimer la Liste</button>
        <script>
            function imprimerListe() {
                var tableau = document.getElementById("tableau");
                var html = "<html><head><link rel=\"stylesheet\" href=\"styleImpression.css\"><title>Contrats</title></head><body>" + tableau.outerHTML + "</body></html>";

                var imprimer = window.open('', '', 'height=500,width=800');
                imprimer.document.write(html);
                imprimer.document.close();
                imprimer.focus();
                imprimer.print();
                imprimer.close();
            }
        </script>
        <form class="search-form" action="listeContrat.php" method="get">
            <input class="search-input" type="text" name="id" id="id" placeholder="Recherche...">
            <button class="search-button" type="submit">Rechercher</button>
        </form>
    </div>
    <center>
        <h1><b>Liste des contrats</b></h1>
    </center>
    <div class="table">
        <table id="tableau">
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
                    <th>Action 2</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($listContrat != null ): ?>
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
                            if($appartement != null){
                                echo 'Categorie : ' . $appartement->getCategorie() . ' ,Type :  ' . $appartement->getTypeAppartement();
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $numLocataire = $contrat->getNumLocataire();
                            $locataireManager = new LocataireManager();
                            $locataire = $locataireManager->getUnique($numLocataire);
                            if($locataire !=null){
                                echo $locataire->getNomLocataire() . ' ' . $locataire->getPrenomLocataire();
                            }
                            ?>
                        </td>
                        <td>
                            <a href="../../traitement/imprimerContrat.php?id=<?php echo $contrat->getNumContrat(); ?>"
                            style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                            >
                            Imprimer
                            </a>
                        </td>
                        <td>
                            <a href="../../traitement/modifierContratT.php?id=<?php echo $contrat->getNumContrat(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette news ?')">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>