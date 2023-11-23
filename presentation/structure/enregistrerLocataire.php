<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Enregistrer un Locataire</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerLocataireT.php">
			<div class="headerform"><h1>Enregistrer un locataire</h1></div>
            <div class="row">
                <div class="col1">
                    <label for="numLocataire">Id du locataire</label>
                    <input type="number" name="numLocataire" id="numLocataire" placeholder="Id du locataire">
                    <br>
                    <label for="nomLocataire">Nom</label>
                    <input type="text" name="nomLocataire" id="nomLocataire" placeholder="Nom">
                    <br>
                    <label for="prenomLocataire">Prenom</label>
                    <input type="text" name="prenomLocataire" id="prenomLocataire" placeholder="Prenom">
                    <br>
                    <label for="adresse1Locataire">Adresse 1</label>
                    <input type="text" name="adresse1Locataire" id="adresse1Locataire" placeholder="Adresse 1">
                    <br>
                    <label for="adresse2Locataire">Adresse 2</label>
                    <input type="text" name="adresse2Locataire" id="adresse2Locataire" placeholder="Adresse 2">
                    <br>
                </div>
                <div class="col2">
                    <label for="codePostalLocataire">Code postal</label>
                    <input type="text" name="codePostalLocataire" id="codePostalLocataire" placeholder="Code postal">
                    <br>
                    <label for="villeLocataire">Ville</label>
                    <input type="text" name="villeLocataire" id="villeLocataire" placeholder="Ville">
                    <br>
                    <label for="numTel1Locataire">Numéro de téléphone 1</label>
                    <input type="number" name="numTel1Locataire" id="numTel1Locataire" placeholder="Numéro de téléphone 1">
                    <br>
                    <label for="numTel2Locataire">Numéro de téléphone 2</label>
                    <input type="number" name="numTel2Locataire" id="numTel2Locataire" placeholder="Numéro de téléphone 2">
                    <br>
                    <label for="emailLocataire">Email</label>
                    <input type="text" name="emailLocataire" id="emailLocataire" placeholder="Email">
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