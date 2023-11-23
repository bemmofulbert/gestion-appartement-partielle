<?php

class Appartement {
    private $numLocation;
    private $categorie;
    private $typeAppartement;
    private $nbPersonnes;
    private $adresseLocation;
    private $photo;
    private $equipement;
    private $codeTarif;
    private $numProprietaire;

    public static $ClassName= "Appartement";

    // public function __construct($assoc) {
    //     if(isset($assoc["numLocation"])) $this->numLocation = $numLocation;
    //     if(isset($assoc["categorie"])) $this->categorie = $categorie;
    //     if(isset($assoc["typeAppartement"])) $this->typeAppartement = $typeAppartement;
    //     if(isset($assoc["nbPersonnes"])) $this->nbPersonnes = $nbPersonnes;
    //     if(isset($assoc["adresseLocation"])) $this->adresseLocation = $adresseLocation;
    //     if(isset($assoc["photo"])) $this->photo = $photo;
    //     if(isset($assoc["equipement "])) $this->equipement = $equipement;
    //     if(isset($assoc["codeTarif"])) $this->codeTarif = $codeTarif;
    //     if(isset($assoc["numProprietaire"])) $this->numProprietaire = $numProprietaire;
    // }
    public function __construct() {
    }
    public static function fromXml($dataXml) {
        $result = new Appartement();
        if(isset($dataXml["numLocation"])) $result->numLocation = strval($dataXml["numLocation"]);

        $result->categorie = strval($dataXml->categorie);
        $result->typeAppartement = strval($dataXml->typeAppartement);
        $result->nbPersonnes = strval($dataXml->nbPersonnes);
        $result->adresseLocation = strval($dataXml->adresseLocation);
        $result->photo = strval($dataXml->photo);
        $result->equipement = strval($dataXml->equipement);
        $result->codeTarif = strval($dataXml->codeTarif);
        $result->numProprietaire = strval($dataXml->numProprietaire);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<appartement numLocation='".$this->numLocation."'>\n";
            $result = $result."\t\t\t<categorie>".$this->categorie."</categorie>\n";
            $result = $result."\t\t\t<nbPersonnes>".$this->nbPersonnes."</nbPersonnes>\n";
            $result = $result."\t\t\t<adresseLocation>".$this->adresseLocation."</adresseLocation>\n";
            $result = $result."\t\t\t<photo>".$this->photo."</photo>\n";
            $result = $result."\t\t\t<typeAppartement>".$this->typeAppartement."</typeAppartement>\n";
            $result = $result."\t\t\t<equipement>".$this->equipement."</equipement>\n";
            $result = $result."\t\t\t<codeTarif>".$this->numLocation."</codeTarif>\n";
            $result = $result."\t\t\t<numProprietaire>".$this->numProprietaire."</numProprietaire>\n";
        $result = $result."\t\t</appartement>\n";
        return $result;
    }
    public function getNumLocation() {
        return $this->numLocation;
    }

    public function setNumLocation($numLocation) {
        $this->numLocation = $numLocation;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function getTypeAppartement() {
        return $this->typeAppartement;
    }

    public function setTypeAppartement($typeAppartement) {
        $this->typeAppartement = $typeAppartement;
    }

    public function getNbPersonnes() {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes($nbPersonnes) {
        $this->nbPersonnes = $nbPersonnes;
    }

    public function getAdresseLocation() {
        return $this->adresseLocation;
    }

    public function setAdresseLocation($adresseLocation) {
        $this->adresseLocation = $adresseLocation;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getEquipement() {
        return $this->equipement;
    }

    public function setEquipement($equipement) {
        $this->equipement = $equipement;
    }

    public function getCodeTarif() {
        return $this->codeTarif;
    }

    public function setCodeTarif($codeTarif) {
        $this->codeTarif = $codeTarif;
    }

    public function getNumProprietaire() {
        return $this->numProprietaire;
    }

    public function setNumProprietaire($numProprietaire) {
        $this->numProprietaire = $numProprietaire;
    }
}
