<?php

include('../../traitement/listeLocataireT.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleImpression.css">
    <title>Liste des Locataires</title>
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
        <form class="search-form" action="listeLocataire.php" method="get">
            <input class="search-input" type="text" name="id" id="id" placeholder="Recherche...">
            <button class="search-button" type="submit">Rechercher</button>
        </form>
    </div>
    <center><h1><b>Liste des Locataires</b></h1></center>
    <div class="table">
        <table id="tableau" >
            <thead>
                <tr>
                    <th>Numéro Locataire</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse 1</th>
                    <th>Adresse 2</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Numéro de téléphone 1</th>
                    <th>Numéro de téléphone 2</th>
                    <th>Email</th>
                    <th>Action 1</th>
                    <th>Action 2</th>
                </tr>
            </thead>
            <tbody>
                
            <?php if ($listLocataire != null ): ?>
            <?php foreach ($listLocataire as $locataire): ?>
                <tr>
                    <td><?php echo $locataire->getNumLocataire();?></td>
                    <td><?php echo $locataire->getNomLocataire();?></td>
                    <td><?php echo $locataire->getPrenomLocataire();?></td>
                    <td><?php echo $locataire->getAdresse1Locataire();?></td>
                    <td><?php echo $locataire->getAdresse2Locataire();?></td>
                    <td><?php echo $locataire->getCodePostalLocataire();?></td>
                    <td><?php echo $locataire->getVilleLocataire();?></td>
                    <td><?php echo $locataire->getNumTel1Locataire();?></td>
                    <td><?php echo $locataire->getNumTel2Locataire();?></td>
                    <td><?php echo $locataire->getemailLocataire();?></td>
                    <td>
                            <a href="../../traitement/modifierLocataireT.php?id=<?php echo $locataire->getNumLocataire(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette news ?')">Modifier</a>
                        </td>
                        <td>
                            <a href="../../traitement/supprimerLocataireT.php?id=<?php echo $locataire->getNumLocataire(); ?>"
                                style="background-color: red; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette news ?')">Supprimer</a>
                        </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>