<?php

class Tarif {
    private $codeTarif;
    private $prixSemHS;
    private $prixSemBS;

    public static $ClassName= "Tarif";

    /*public function __construct($codeTarif, $prixSemHS, $prixSemBS) {
        $this->codeTarif = $codeTarif;
        $this->prixSemHS = $prixSemHS;
        $this->prixSemBS = $prixSemBS;
    }*/

    public function __construct(){
        
    }

    public static function fromXml($dataXml) {
        $result = new Tarif();

        if(isset($dataXml["codeTarif"])) $result->codeTarif = strval($dataXml["codeTarif"]);

            $result->prixSemHS = strval($dataXml->prixSemHS);
            $result->prixSemBS = strval($dataXml->prixSemBS);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<tarif codeTarif='".$this->codeTarif."'>\n";
            $result = $result."\t\t\t<prixSemHS>".$this->prixSemHS."</prixSemHS>\n";
            $result = $result."\t\t\t<prixSemBS>".$this->prixSemBS."</prixSemBS>\n";
        $result = $result."\t\t</tarif>\n";
        return $result;
    }

    public function getCodeTarif() {
        return $this->codeTarif;
    }

    public function setCodeTarif($codeTarif) {
        $this->codeTarif = $codeTarif;
    }

    public function getPrixSemHS() {
        return $this->prixSemHS;
    }

    public function setPrixSemHS($prixSemHS) {
        $this->prixSemHS = $prixSemHS;
    }

    public function getPrixSemBS() {
        return $this->prixSemBS;
    }

    public function setPrixSemBS($prixSemBS) {
        $this->prixSemBS = $prixSemBS;
    }
}
