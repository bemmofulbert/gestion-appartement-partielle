<?php

require('../donnees/contratManager.php');
require('../donnees/locataireManager.php');
require('../donnees/proprietaireManager.php');
require('../donnees/appartementManager.php');
require('../donnees/tarifManager.php');

$contratManager = new ContratManager();
$locataireManager = new LocataireManager();
$proprietaireManager = new ProprietaireManager();
$appartementManager = new AppartementManager();
$tarifManager = new TarifManager();
$date = date('d/m/y');


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $contrat = $contratManager->getUnique($id);
    $appartement = $appartementManager->getUnique($contrat->getNumLocation());
    $proprietaire = $proprietaireManager->getUnique($appartement->getNumProprietaire());
    $locataire = $locataireManager->getUnique($contrat->getNumLocataire());
    $tarif = $tarifManager->getUnique($appartement->getCodeTarif());

    echo '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Contrat n°' . $contrat->getNumContrat() . '</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .container {
                margin-top: 50px;
            }
            .text-center {
                text-align: center;
            }
            .mb-4 {
                margin-bottom: 4rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center mb-4">Contrat de Location n°' . $contrat->getNumContrat() . '</h1>
            <div class="row">
                <div class="col-md-12 text-center">
                    Entre les soussignés : 
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-md-5 text-left">

                    '. $proprietaire->getNom() . '  ' . $proprietaire->getPrenom() .'
                    <br>
                    '. $proprietaire->getAdresse1() .'
                    <br>
                    '. $proprietaire->getNumTel1() .'
                    <br>
                    '. $proprietaire->getEmail() .'
                    <br>
                    <br>
                    (ci-après "le Bailleur")

                </div>
                
                <div class="col-md-2 text-center">
                    <br>
                    <br>
                    <strong>Et</strong>
                </div>
                
                <div class="col-md-5 text-right">

                    '. $locataire->getNomLocataire() . '  ' . $locataire->getPrenomLocataire() .'
                    <br>
                    '. $locataire->getAdresse1Locataire() .'
                    <br>
                    '. $locataire->getNumTel1Locataire() .'
                    <br>
                    '. $locataire->getEmailLocataire() .'
                    <br>
                    <br>
                    (ci-après "le Locataire")
                
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    Il a été convenu et arrêté ce qui suit : 
                </div>
            </div>

            <div class="row" style="text-align: justify;">
                <div class="col-md-12">
                    <br>
                    <strong>OBJET</strong> : La location d\'un appartement situé au <strong>'. $appartement->getAdresseLocation() .'</strong>, dont le type est : <strong>'. $appartement->getTypeAppartement() .'</strong> , la catégorie est : <strong>'. $appartement->getCategorie() .'</strong> , pouvant abriter au maximum <strong>'. $appartement->getNbPersonnes() .'</strong> personnes et contenant comme équipements : <strong>'. $appartement->getEquipement() .'</strong>.
                    <br>
                    <br>
                    <strong>DUREE</strong> : Le présent contrat est consenti pour une durée allant de <strong>'. $contrat->getDateDebut() .'</strong> jusqu\'au <strong>'. $contrat->getDateFin() .'</strong>.
                    <br>
                    <br>
                    <strong>LOYER</strong> : Le loyer mensuel est fixé à <strong>'. $tarif->getPrixSemHS() .'</strong> XAF, payable par mois d\'avance le <strong>'. substr($contrat->getDateDebut(), -2) .'</strong> de chaque mois.
                    <br>
                    <br>
                    <strong>OBLIGATIONS DU BAILLEUR</strong> : Le bailleur s\'engage à fournir un logement en bon état, conforme aux normes de sécurité et d\'habitabilité en vigueur, et à procéder aux réparations nécessaires à son entretien. Le bailleur est également tenu de fournir au locataire les diagnostics immobiliers obligatoires.
                    <br>
                    <br>
                    <strong>OBLIGATIONS DU LOCATAIRE</strong> : Le locataire s\'engage à occuper les lieux personnellement et à les utiliser en bon père de famille. Le locataire s\'engage également à acquitter le loyer et les charges aux termes convenus, à entretenir le logement et à en faire un usage paisible.
                    <br>
                    <br>
                    <strong>ENTRETIEN ET REPARATIONS</strong> : Les réparations locatives sont à la charge du locataire. Le bailleur prend en charge les grosses réparations, notamment celles relatives à la structure du logement.
                    <br>
                    <br>
                    Sous réserve des dispositions légales en vigueur, le locataire ne pourra exercer aucun recours contre le bailleur en cas de pertes ou de dégradations subies par suite de vols, cambriolages ou actes de vandalisme.
                    <br>
                    <br>
                    <strong>FIN DU CONTRAT</strong> : A l\'expiration du contrat, le locataire s\'engage à rendre les lieux en bon état, sauf usure normale. Le bailleur effectuera l\'état des lieux de sortie dans les conditions légales.
                    <br>
                    <br>
                    FAIT EN DEUX EXEMPLAIRES, A <strong>Bandjoun</strong>, Le <strong>'. $date .'</strong>.
                </div>
            </div>
            <br>
            <div class="row" style="padding: 6%">
                <div class="col-md-6 text-left" >
                <strong>Le Bailleur</strong>
                </div>
                <div class="col-md-6 text-right">
                <strong>Le Locataire</strong>
                </div>
            </div>
            <hr>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            window.print();
        </script>
    </body>
    </html>
    ';
}

?>