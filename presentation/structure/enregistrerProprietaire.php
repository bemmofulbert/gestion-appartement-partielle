<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Enregistrer un Propriétaire</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerProprietaireT.php">
			<div class="headerform"><h1>Enregistrer un propriétaire</h1></div>
            <label for="numProprietaire">Id du propriétaire</label>
            <input type="number" name="numProprietaire" id="numProprietaire" placeholder="Id du proprietaire">
            <br>
            <div class="row">
                <div class="col1">
                    <label for="nomProprietaire">Nom</label>
                    <input type="text" name="nomProprietaire" id="nomProprietaire" placeholder="Nom">
                    <br>
                    <label for="prenomProprietaire">Prenom</label>
                    <input type="text" name="prenomProprietaire" id="prenomProprietaire" placeholder="Prenom">
                    <br>
                    <label for="adresse1Proprietaire">Adresse 1</label>
                    <input type="text" name="adresse1Proprietaire" id="adresse1Proprietaire" placeholder="Adresse 1">
                    <br>
                    <label for="adresse2Proprietaire">Adresse 2</label>
                    <input type="text" name="adresse2Proprietaire" id="adresse2Proprietaire" placeholder="Adresse 2">
                    <br>
                    <label for="CAcumule">CA cumulé</label>
                    <input type="number" name="CAcumule" id="CAcumule" placeholder="CA cumulé">
                    <br>
                </div>
                <div class="col2">
                    <label for="codePostalProprietaire">Code postal</label>
                    <input type="text" name="codePostalProprietaire" id="codePostalProprietaire" placeholder="Code postal">
                    <br>
                    <label for="villeProprietaire">Ville</label>
                    <input type="text" name="villeProprietaire" id="villeProprietaire" placeholder="Ville">
                    <br>
                    <label for="numTel1Proprietaire">Numéro de téléphone 1</label>
                    <input type="number" name="numTel1Proprietaire" id="numTel1Proprietaire" placeholder="Numéro de téléphone 1">
                    <br>
                    <label for="numTel2Proprietaire">Numéro de téléphone 2</label>
                    <input type="number" name="numTel2Proprietaire" id="numTel2Proprietaire" placeholder="Numéro de téléphone 2">
                    <br>
                    <label for="emailProprietaire">Email</label>
                    <input type="text" name="emailProprietaire" id="emailProprietaire" placeholder="Email">
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