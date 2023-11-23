<?php

include('../../traitement/listeProprietaireT.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleImpression.css">
    <title>Liste des Propriétaires</title>
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
        <form class="search-form" action="listeProprietaire.php" method="get">
            <input class="search-input" type="text" name="id" id="id" placeholder="Recherche...">
            <button class="search-button" type="submit">Rechercher</button>
        </form>
    </div>
    <center><h1><b>Liste des Propriétaires</b></h1></center>
    <div class="table">
        <table id="tableau" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse 1</th>
                    <th>Adresse 2</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Numéro de téléphone 1</th>
                    <th>Numéro de téléphone 2</th>
                    <th>CA cumulé</th>
                    <th>Email</th>
                    <th>Action 1</th>
                    <th>Action 2</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($listProprietaire != null ): ?>
                <?php foreach ($listProprietaire as $proprietaire): ?>
                <tr>
                    <td><?php echo $proprietaire->getNumProprietaire();?></td>
                    <td><?php echo $proprietaire->getNom();?></td>
                    <td><?php echo $proprietaire->getPrenom();?></td>
                    <td><?php echo $proprietaire->getAdresse1();?></td>
                    <td><?php echo $proprietaire->getAdresse2();?></td>
                    <td><?php echo $proprietaire->getCodePostal();?></td>
                    <td><?php echo $proprietaire->getVille();?></td>
                    <td><?php echo $proprietaire->getNumTel1();?></td>
                    <td><?php echo $proprietaire->getNumTel2();?></td>
                    <td><?php echo $proprietaire->getCAcumule();?></td>
                    <td><?php echo $proprietaire->getemail();?></td>
                    <td>
                            <a href="../../traitement/modifierProprietaireT.php?id=<?php echo $proprietaire->getNumProprietaire(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette news ?')">Modifier</a>
                        </td>
                        <td>
                            <a href="../../traitement/supprimerProprietaireT.php?id=<?php echo $proprietaire->getNumProprietaire(); ?>"
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