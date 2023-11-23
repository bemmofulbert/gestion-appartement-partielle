<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Enregistrer un Tarif</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerTarifT.php">
			<div class="headerform"><h1>Enregistrer un tarif</h1></div>
            <label for="codeTarif">Id du Tarif</label>
            <input type="number" name="codeTarif" id="codeTarif" placeholder="Id du tarif">
            <br>
            <div class="row">
                <div class="col1">
                    <label for="prixSemHS">Id du locataire</label>
                    <input type="number" name="prixSemHS" id="prixSemHS" placeholder="prixSemHS">
                    <br>
                </div>
                <div class="col2">
                    <label for="prixSemBS">Code postal</label>
                    <input type="number" name="prixSemBS" id="prixSemBS" placeholder="prixSemBS">
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