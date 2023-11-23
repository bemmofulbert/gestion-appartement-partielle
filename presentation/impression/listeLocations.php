<?php

include('../../traitement/listeAppartementT.php');
require_once('../../donnees/proprietaireManager.php');
require_once('../../donnees/tarifManager.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleImpression.css">
    <title>Liste des Locations</title>
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
        <form class="search-form" action="listeLocations.php" method="get">
            <input class="search-input" type="text" name="id" id="id" placeholder="Recherche...">
            <button class="search-button" type="submit">Rechercher</button>
        </form>
    </div>
    <center><h1><b>Liste des Locations</b></h1></center>
    <div class="table">
        <table id="tableau" >
            <thead>
                <tr>
                    <th>Numéro Location</th>
                    <th>Catégorie</th>
                    <th>Type d'appartement</th>
                    <th>Nombre de personnes</th>
                    <th>Adresse de la location</th>
                    <th>Photo</th>
                    <th>Equipements</th>
                    <th>Tarif</th>
                    <th>Propriétaire</th>
                    <th>Action 1</th>
                    <th>Action 2</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($listAppartement != null ):?>
                <?php foreach ($listAppartement as $appartement): ?>
                    <tr>
                        <td><?php echo $appartement->getNumLocation();?></td>
                        <td><?php echo $appartement->getCategorie();?></td>
                        <td><?php echo $appartement->getTypeAppartement();?></td>
                        <td><?php echo $appartement->getNbPersonnes();?></td>
                        <td><?php echo $appartement->getAdresseLocation();?></td>
                        <td>
                            <?php 
                            $photo = $appartement->getPhoto();
                            echo "<img src='../../traitement/imageUpload/" . $photo . "' alt='' style='width: 100px; height: 100px'>";
                            ?>
                        </td>
                        <td><?php echo $appartement->getEquipement();?></td>
                        <td>
                            <?php 
                            $codeTarif = $appartement->getCodeTarif();
                            $tarifManager = new TarifManager();
                            $tarif = $tarifManager->getUnique($codeTarif);
                            if($tarif != null){
                                echo 'PrixSemBS: '. $tarif->getPrixSemBS() . ' , ' . 'PrixSemHS: ' . $tarif->getPrixSemHS();
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $numProprietaire = $appartement->getNumProprietaire();
                            $proprietaireManager = new ProprietaireManager();
                            $proprietaire = $proprietaireManager->getUnique($numProprietaire);
                            if($proprietaire != null){
                                echo $proprietaire->getNom() . ' ' . $proprietaire->getPrenom();
                            }
                            ?>
                        </td>
                        <td>
                            <a href="../../traitement/modifierAppartementT.php?id=<?php echo $appartement->getNumLocation(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette news ?')">Modifier</a>
                        </td>
                        <td>
                            <a href="../../traitement/supprimerAppartementT.php?id=<?php echo $appartement->getNumLocation(); ?>"
                                style="background-color: red; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette news ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>
</html>