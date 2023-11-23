<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Header</title>
</head>
<body>
    <nav class="navbar">
        <div class="titlenav"><h2>Location Management</h2></div>
        <ul class="nav-links">
            <li style="color: white;"><a href="acceuil.php">Accueil</a></li>
            <li class="dropdown" style="color: white;">
                Structure
                <ul class="dropdown-menu">
                    <li><a href="structure/enregistrerAppartement.php">Créer un Appartement</a></li>
                    <li><a href="structure/enregistrerProprietaire.php">Créer un Propriétaire</a></li>
                    <li><a href="structure/enregistrerTarif.php">Créer un Tarif</a></li>
                    <li><a href="structure/enregistrerLocataire.php">Créer un Locataire</a></li>
                    <li><a href="structure/enregistrerUser.php">Créer un Utilisateur</a></li>
                </ul>
            </li>
            <li class="dropdown" style="color: white;">
                Traitement
                <ul class="dropdown-menu">
                <li><a href="traitement/passerContrat.php">Passer un Contrat</a></li>
                <li><a href="traitement/modifierContrat.php">Modifier un Contrat</a></li>
                <li><a href="traitement/resilierContrat.php">Résilier un Contrat</a></li>
                </ul>
            </li>
            <li class="dropdown" style="color: white;">
                Impression
                <ul class="dropdown-menu">
                <li><a href="impression/listeLocations.php">Liste des Locations</a></li>
                <li><a href="impression/listeProprietaire.php">Liste des Propriétaires</a></li>
                <li><a href="impression/listeLocataire.php">Liste des Locataires</a></li>
                <li><a href="impression/listeContrat.php">Liste des Contrats</a></li>
                <li><a href="impression/listeUser.php">Liste des Utilisateurs</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <br>
</body>
</html>