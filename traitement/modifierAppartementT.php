<?php

require('../donnees/appartementManager.php');
require('../donnees/proprietaireManager.php');
require('../donnees/tarifManager.php');

$proprietaireManager = new ProprietaireManager();

$tarifManager = new TarifManager();

$listProprietaire = $proprietaireManager->getList();

$listTarif = $tarifManager->getList();

$appartementManager = new AppartementManager();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $appartement = $appartementManager->getUnique($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

        $categorie = $_POST['categorie'];
        $type = $_POST['type'];
        $idProprietaire = $_POST['idProprietaire'];
        $equipement = $_POST['equipement'];
        $nbPersonnes = $_POST['nbPersonnes'];
        $adresseLocation = $_POST['adresseLocation'];
        $idTarif = $_POST['idTarif'];
    
        $target_dir = 'imageUpload/';
        $target_file = $target_dir . basename($_FILES['photo']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $nomFichier = $_FILES['photo']['name'];
    
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
    
        $appartement->setCategorie($categorie);
        $appartement->setTypeAppartement($type);
        $appartement->setNumProprietaire($idProprietaire);
        $appartement->setEquipement($equipement);
        $appartement->setNbPersonnes($nbPersonnes);
        $appartement->setAdresseLocation($adresseLocation);
        $appartement->setCodeTarif($idTarif);
        $appartement->setPhoto($nomFichier);
    
        $appartementManager = new AppartementManager();
    
        $appartementManager->update($appartement);

        header('Location: ../presentation/impression/listeLocations.php');
        exit();
    
    }
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../presentation/style.css">
    <title>Modifier un Appartement</title>
</head>
<body>
<?php include "navbar.php"; ?>
    <br>
    <div id="container">
        <form method="POST" action=# enctype="multipart/form-data">
			<div class="headerform"><h1>Modifier un appartement</h1></div>
            <br>
            <div class="row">
                <div class="col1">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Catégorie</option>
                        <option value="standard" <?php if ($appartement->getCategorie() == 'standard') echo 'selected'; ?>>Standard</option>
                        <option value="confort" <?php if ($appartement->getCategorie() == 'confort') echo 'selected'; ?>>Confort</option>
                        <option value="prestige" <?php if ($appartement->getCategorie() == 'prestige') echo 'selected'; ?>>Prestige</option>
                    </select>
                    <br>
                    <label for="type">Type</label>
                    <select name="type" id="type">
                        <option value="">Type</option>
                        <option value="studio" <?php if ($appartement->getTypeAppartement() == "studio") echo "selected"; ?>>Studio</option>
                        <option value="appartement 1 chambre" <?php if ($appartement->getTypeAppartement() == "appartement 1 chambre") echo "selected"; ?>>Appartement une chambre</option>
                        <option value="appartement 2 chambres" <?php if ($appartement->getTypeAppartement() == "appartement 2 chambres") echo "selected"; ?>>Appartement deux chambres</option>
                        <option value="duplex" <?php if ($appartement->getTypeAppartement() == "duplex") echo "selected"; ?>>Duplex</option>
                        <option value="loft" <?php if ($appartement->getTypeAppartement() == "loft") echo "selected"; ?>>Loft</option>
                        <option value="penthouse" <?php if ($appartement->getTypeAppartement() == "penthouse") echo "selected"; ?>>Penthouse</option>
                        <option value="Appartement meuble" <?php if ($appartement->getTypeAppartement() == "Appartement meuble") echo "selected"; ?>>Appartement meublé</option>
                    </select>
                    <br>
                    <label for="idProprietaire">Propriétaire</label>
                    <select name="idProprietaire" id="idProprietaire">
                        <option value="">Propriétaire</option>
                        <?php foreach ($listProprietaire as $proprietaire): ?>
                            <?php $selected = ($proprietaire->getNumProprietaire() == $appartement->getNumProprietaire()) ? 'selected' : ''; ?>
                            <option value="<?php echo $proprietaire->getNumProprietaire(); ?>" <?php echo $selected; ?>>
                                <?php echo $proprietaire->getNom() . ' ' . $proprietaire->getPrenom(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="equipement">Equipement</label>
                    <input type="text" name="equipement" id="equipement" placeholder="Equipement" value="<?php echo $appartement->getEquipement();?>">
                    <br>
                </div>
                <div class="col2">
                    <label for="nbPersonnes">Nombre de personnes</label>
                    <input type="number" name="nbPersonnes" id="nbPersonnes" placeholder="Nombre de personnes" value="<?php echo $appartement->getNbPersonnes();?>">
                    <br>
                    <label for="adresseLocation">Adresse de la location</label>
                    <input type="text" name="adresseLocation" id="adresseLocation" placeholder="adresse de la location" value="<?php echo $appartement->getAdresseLocation();?>">
                    <br>
                    <label for="photo">Photo</label>
                    <div class="photo" style="display: flex; align-items: center;">
                        <input type="file" name="photo" id="photo" accept="image/jpeg, image/jpg, image/png" style="flex-grow: 1;" onchange="previewImage()">
                        <?php if ($appartement->getPhoto()): ?>
                        <img id="image-preview" src="imageUpload/<?php echo $appartement->getPhoto(); ?>" alt="photo de l'appartement" style="width: 100px; height: 50px; margin-left: 10px;">
                        <?php endif; ?>
                    </div>
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
                    <br>
                    <label for="idTarif">Tarif</label>
                    <select name="idTarif" id="idTarif">
                        <option value="">Tarif</option>
                        <?php foreach ($listTarif as $tarif): ?>
                            <option value="<?php echo $tarif->getCodeTarif(); ?>" <?php if($tarif->getCodeTarif() == $appartement->getCodeTarif()) { echo "selected"; } ?>>
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