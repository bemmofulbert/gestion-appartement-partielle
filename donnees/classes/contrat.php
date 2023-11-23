<?php

class Contrat {
    private $numContrat;
    private $etat;
    private $dateCreation;
    private $dateDebut;
    private $dateFin;
    private $numLocation;
    private $numLocataire;

    public static $ClassName= "Contrat";

    /*public function __construct($numContrat, $etat, $dateCreation, $dateDebut, $dateFin, $numLocation, $numLocataire) {
        $this->numContrat = $numContrat;
        $this->etat = $etat;
        $this->dateCreation = $dateCreation;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->numLocation = $numLocation;
        $this->numLocataire = $numLocataire;
    }*/

    public function __construct(){
        
    }

    public static function fromXml($dataXml) {
        $result = new Contrat();
        if(isset($dataXml["numContrat"])) $result->numContrat = strval($dataXml["numContrat"]);

            $result->etat = strval($dataXml->etat);
            $result->dateCreation = strval($dataXml->dateCreation);
            $result->dateDebut = strval($dataXml->dateDebut);
            $result->dateFin = strval($dataXml->dateFin);
            $result->numLocation = strval($dataXml->numLocation);
            $result->numLocataire = strval($dataXml->numLocataire);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<contrat numContrat='".$this->numContrat."'>\n";
            $result = $result."\t\t\t<etat>".$this->etat."</etat>\n";
            $result = $result."\t\t\t<dateCreation>".$this->dateCreation."</dateCreation>\n";
            $result = $result."\t\t\t<dateDebut>".$this->dateDebut."</dateDebut>\n";
            $result = $result."\t\t\t<dateFin>".$this->dateFin."</dateFin>\n";
            $result = $result."\t\t\t<numLocation>".$this->numLocation."</numLocation>\n";
            $result = $result."\t\t\t<numLocataire>".$this->numLocataire."</numLocataire>\n";
        $result = $result."\t\t</contrat>\n";
        return $result;
    }

    // Getters
    public function getNumContrat() {
        return $this->numContrat;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function getNumLocation() {
        return $this->numLocation;
    }

    public function getNumLocataire() {
        return $this->numLocataire;
    }

    // Setters

    public function setNumContrat($numContrat){
        $this->numContrat = $numContrat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    public function setNumLocation($numLocation) {
        $this->numLocation = $numLocation;
    }

    public function setNumLocataire($numLocataire) {
        $this->numLocataire = $numLocataire;
    }
}

?>