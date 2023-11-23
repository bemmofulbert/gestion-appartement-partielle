<?php

include('../../traitement/listeProprietaireT.php');
include('../../traitement/listeTarifsT.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Enregistrer un Appartement</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerAppartementT.php" enctype="multipart/form-data">
			<div class="headerform"><h1>Enregistrer un appartement</h1></div>
            <label for="numLocation">Id de l'appartement</label>
            <input type="number" name="numLocation" id="numLocation" placeholder="Id de l'appartement">
            <br>
            <div class="row">
                <div class="col1">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Catégorie</option>
                        <option value="standard">Standard</option>
                        <option value="confort">Confort</option>
                        <option value="prestige">Prestige</option>
                    </select>
                    <br>
                    <label for="type">Type</label>
                    <select name="type" id="type">
                        <option value="">Type</option>
                        <option value="studio">Studio</option>
                        <option value="appartement 1 chambre">Appartement une chambre</option>
                        <option value="appartement 2 chambres">Appartement deux chambres</option>
                        <option value="duplex">Duplex</option>
                        <option value="loft">Loft</option>
                        <option value="penthouse">Penthouse</option>
                        <option value="Appartement meuble">Appartement meublé</option>
                    </select>
                    <br>
                    <label for="idProprietaire">Propriétaire</label>
                    <select name="idProprietaire" id="idProprietaire">
                        <option value="">Propriétaire</option>
                        <?php foreach ($listProprietaire as $proprietaire): ?>
                            <option value="<?php echo $proprietaire->getNumProprietaire(); ?>">
                                <?php echo $proprietaire->getNom() . ' ' . $proprietaire->getPrenom(); ?>
                                </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="equipement">Equipement</label>
                    <input type="text" name="equipement" id="equipement" placeholder="Equipement">
                    <br>
                </div>
                <div class="col2">
                    <label for="nbPersonnes">Nombre de personnes</label>
                    <input type="number" name="nbPersonnes" id="nbPersonnes" placeholder="Nombre de personnes">
                    <br>
                    <label for="adresseLocation">Adresse de la location</label>
                    <input type="text" name="adresseLocation" id="adresseLocation" placeholder="adresse de la location">
                    <br>
                    <label for="photo">Photo</label>
                    <div class="photo" style="display: flex; align-items: center;">
                        <input type="file" name="photo" id="photo" accept="image/jpeg, image/jpg, image/png" style="flex-grow: 1;" onchange="previewImage()">
                        <style>
                            .photo img[src=""] {
                                display: none;
                            }
                        </style>
                        <img id="image-preview" src="" alt="" style="width: 100px; height: 50px; margin-left: 10px;">
                        <script>
                        function previewImage() {
                            const preview = document.querySelector('#image-preview');
                            const file = document.querySelector('#photo').files[0];
                            const reader = new FileReader();

                            reader.addEventListener("load", function () {
                                // convertir l'image en URL de données
                                preview.src = reader.result;
                            }, false);

                            if (file) {
                                // lire le fichier en tant que données binaires
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
                    </div>
                    <br>
                    <label for="idTarif">Tarif</label>
                    <select name="idTarif" id="idTarif">
                        <option value="">Tarif</option>
                        <?php foreach ($listTarif as $tarif): ?>
                        <option value="<?php echo $tarif->getCodeTarif();?>">
                        <?php echo 'PrixSemBS: '. $tarif->getPrixSemBS() . ' , ' . 'PrixSemHS: ' . $tarif->getPrixSemHS(); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
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