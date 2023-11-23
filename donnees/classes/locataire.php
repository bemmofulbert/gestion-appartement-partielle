<?php

class Locataire {
    private $numLocataire;
    private $nomLocataire;
    private $prenomLocataire;
    private $adresse1Locataire;
    private $adresse2Locataire;
    private $codePostalLocataire;
    private $villeLocataire;
    private $numTel1Locataire;
    private $numTel2Locataire;
    private $emailLocataire;

    public static $ClassName= "Locataire";

    /*public function __construct($numLocataire, $nomLocataire, $prenomLocataire, $adresse1Locataire, $adresse2Locataire, $codePostalLocataire, $villeLocataire, $numTel1Locataire, $numTel2Locataire, $emailLocataire) {
        $this->numLocataire = $numLocataire;
        $this->nomLocataire = $nomLocataire;
        $this->prenomLocataire = $prenomLocataire;
        $this->adresse1Locataire = $adresse1Locataire;
        $this->adresse2Locataire = $adresse2Locataire;
        $this->codePostalLocataire = $codePostalLocataire;
        $this->villeLocataire = $villeLocataire;
        $this->numTel1Locataire = $numTel1Locataire;
        $this->numTel2Locataire = $numTel2Locataire;
        $this->emailLocataire = $emailLocataire;
    }*/

    public function __construct(){
        
    }

    public static function fromXml($dataXml) {
        $result = new Locataire();
        if(isset($dataXml["numLocataire"])) $result->numLocataire = strval($dataXml["numLocataire"]);

            $result->nomLocataire = strval($dataXml->nomLocataire);
            $result->prenomLocataire = strval($dataXml->prenomLocataire);
            $result->adresse1Locataire = strval($dataXml->adresse1Locataire);
            $result->adresse2Locataire = strval($dataXml->adresse2Locataire);
            $result->codePostalLocataire = strval($dataXml->codePostalLocataire);

            $result->villeLocataire = strval($dataXml->villeLocataire);
            $result->numTel1Locataire = strval($dataXml->numTel1Locataire);
            $result->numTel2Locataire = strval($dataXml->numTel2Locataire);
            $result->emailLocataire = strval($dataXml->emailLocataire);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<locataire numLocataire='".$this->numLocataire."'>\n";
            $result = $result."\t\t\t<nomLocataire>".$this->nomLocataire."</nomLocataire>\n";
            $result = $result."\t\t\t<prenomLocataire>".$this->prenomLocataire."</prenomLocataire>\n";
            $result = $result."\t\t\t<adresse1Locataire>".$this->adresse1Locataire."</adresse1Locataire>\n";
            $result = $result."\t\t\t<adresse2Locataire>".$this->adresse2Locataire."</adresse2Locataire>\n";
            $result = $result."\t\t\t<codePostalLocataire>".$this->codePostalLocataire."</codePostalLocataire>\n";
            $result = $result."\t\t\t<villeLocataire>".$this->villeLocataire."</villeLocataire>\n";

            $result = $result."\t\t\t<numTel1Locataire>".$this->numTel1Locataire."</numTel1Locataire>\n";
            $result = $result."\t\t\t<numTel2Locataire>".$this->numTel2Locataire."</numTel2Locataire>\n";
            $result = $result."\t\t\t<emailLocataire>".$this->emailLocataire."</emailLocataire>\n";
        $result = $result."\t\t</locataire>\n";
        return $result;
    }

    // Getters
    public function getNumLocataire() {
        return $this->numLocataire;
    }

    public function getNomLocataire() {
        return $this->nomLocataire;
    }

    public function getPrenomLocataire() {
        return $this->prenomLocataire;
    }

    public function getAdresse1Locataire() {
        return $this->adresse1Locataire;
    }

    public function getAdresse2Locataire() {
        return $this->adresse2Locataire;
    }

    public function getCodePostalLocataire() {
        return $this->codePostalLocataire;
    }

    public function getVilleLocataire() {
        return $this->villeLocataire;
    }

    public function getNumTel1Locataire() {
        return $this->numTel1Locataire;
    }

    public function getNumTel2Locataire() {
        return $this->numTel2Locataire;
    }

    public function getEmailLocataire() {
        return $this->emailLocataire;
    }

    // Setters
    public function setNumLocataire($numLocataire) {
        $this->numLocataire = $numLocataire;
    }

    public function setNomLocataire($nomLocataire) {
        $this->nomLocataire = $nomLocataire;
    }

    public function setPrenomLocataire($prenomLocataire) {
        $this->prenomLocataire = $prenomLocataire;
    }

    public function setAdresse1Locataire($adresse1Locataire) {
        $this->adresse1Locataire = $adresse1Locataire;
    }

    public function setAdresse2Locataire($adresse2Locataire) {
        $this->adresse2Locataire = $adresse2Locataire;
    }

    public function setCodePostalLocataire($codePostalLocataire) {
        $this->codePostalLocataire = $codePostalLocataire;
    }

    public function setVilleLocataire($villeLocataire) {
        $this->villeLocataire = $villeLocataire;
    }

    public function setNumTel1Locataire($numTel1Locataire){
        $this->numTel1Locataire = $numTel1Locataire;
    }

    public function setNumTel2Locataire($numTel2Locataire){
        $this->numTel2Locataire = $numTel2Locataire;
    }

    public function setEmailLocataire($emailLocataire){
        $this->emailLocataire = $emailLocataire;
    }
}
?>
