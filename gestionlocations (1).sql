
CREATE DATABASE IF NOT EXISTS `gestionlocations` DEFAULT CHARACTER ;
USE `gestionlocations`;

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `numLocation` int NOT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `typeAppartement` varchar(30) DEFAULT NULL,
  `nbPersonnes` int DEFAULT NULL,
  `adresseLocation` varchar(40) DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `equipement` varchar(50) DEFAULT NULL,
  `codeTarif` int DEFAULT NULL,
  `numProprietaire` int DEFAULT NULL,
  PRIMARY KEY (`numLocation`),
  KEY `codeTarif` (`codeTarif`),
  KEY `numProprietaire` (`numProprietaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `appartement`
--

INSERT INTO `appartement` (`numLocation`, `categorie`, `typeAppartement`, `nbPersonnes`, `adresseLocation`, `photo`, `equipement`, `codeTarif`, `numProprietaire`) VALUES
(8, 'standard', 'appartement 1 chambre', 4, 'Bandjoun', 'Capture d’écran 2022-10-24 163438.png', 'table, chaise', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `numContrat` int NOT NULL,
  `etat` varchar(20) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `numLocation` int DEFAULT NULL,
  `numLocataire` int DEFAULT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `numLocation` (`numLocation`),
  KEY `numLocataire` (`numLocataire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`numContrat`, `etat`, `dateCreation`, `dateDebut`, `dateFin`, `numLocation`, `numLocataire`) VALUES
(0, 'resilié', '2023-05-01', '2023-05-01', '2023-06-01', 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `numLocataire` int NOT NULL,
  `nomLocataire` varchar(20) DEFAULT NULL,
  `prenomLocataire` varchar(20) DEFAULT NULL,
  `adresse1Locataire` varchar(20) DEFAULT NULL,
  `adresse2Locataire` varchar(20) DEFAULT NULL,
  `codePostalLocataire` varchar(20) DEFAULT NULL,
  `villeLocataire` varchar(20) DEFAULT NULL,
  `numTel1Locataire` int DEFAULT NULL,
  `numTel2Locataire` int DEFAULT NULL,
  `emailLocataire` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`numLocataire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`numLocataire`, `nomLocataire`, `prenomLocataire`, `adresse1Locataire`, `adresse2Locataire`, `codePostalLocataire`, `villeLocataire`, `numTel1Locataire`, `numTel2Locataire`, `emailLocataire`) VALUES
(5, 'cqsmqmkldlqsd', 'kncklqncqksc', 'cjkcnjqscjs', 'hlkqncqkscn', 'ilkqksdqdq', 'klnqnsclkqnscq', 564561321, 65431231, 'jcbqjksbcqs@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `numProprietaire` int NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `adresse1` varchar(20) DEFAULT NULL,
  `adresse2` varchar(20) DEFAULT NULL,
  `codePostal` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `numTel1` int DEFAULT NULL,
  `numTel2` int DEFAULT NULL,
  `CAcumule` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`numProprietaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;


--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`numProprietaire`, `nom`, `prenom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `numTel1`, `numTel2`, `CAcumule`, `email`) VALUES
(1, 'BEMMO MBOBDA', 'Fulbert Alexandre', 'Yaoundé', 'Bandjoun', 'BP 06 Bandjoun', 'Bandjoun', 682193157, 676376926, '2000000', 'bemmofulbert@gmail.com'),
(2, 'Bems', 'Alexandre ', 'Yaoundé', 'Bandjoun', 'BP 06 Bandjoun', 'Bandjoun', 676376926, 682193157, '2558522', 'fbemmo.megasoft@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `codeTarif` int NOT NULL,
  `prixSemHS` int DEFAULT NULL,
  `prixSemBS` int DEFAULT NULL,
  PRIMARY KEY (`codeTarif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`codeTarif`, `prixSemHS`, `prixSemBS`) VALUES
(1, 200000, 150000),
(2, 300000, 250000),
(3, 450000, 400000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
