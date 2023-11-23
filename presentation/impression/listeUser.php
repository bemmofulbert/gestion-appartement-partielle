<?php

include('../../traitement/listeUserT.php');
require_once('../../donnees/userManager.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleImpression.css">
    <title>Liste des Utilisateurs</title>
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
        <h1><b>Liste des Utilisateurs</b></h1>
    </center>
    <div class="table">
        <table id="tableau">
            <thead>
                <tr>
                    <th>Id Utilisateur</th>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Role</th>
                    <th>Action 1</th>
                    <th>Action 2</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($listUser!= null ): ?>
                <?php foreach ($listUser as $user): ?>
                    <tr>
                        <td>
                            <?php echo $user->getIdUser(); ?>
                        </td>
                        <td>
                            <?php echo $user->getLogin(); ?>
                        </td>
                        <td>
                            <?php echo $user->getMdp(); ?>
                        </td>
                        <td>
                            <?php echo $user->getRole(); ?>
                        </td>
                        <td>
                            <a href="../../traitement/modifierUserT.php?id=<?php echo $user->getIdUser(); ?>"
                                style="background-color: #0cbb29; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir modifier cette Utilisateur ?')">Modifier</a>
                        </td>
                        <td>
                            <a href="../../traitement/supprimerUserT.php?id=<?php echo $user->getIdUser(); ?>"
                                style="background-color: red; color: white; padding: 7px 10px; margin: 4px 0; border: none; cursor: pointer; width: 100%;"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Utilisateur ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>