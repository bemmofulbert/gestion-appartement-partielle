<?php

class Proprietaire
{
    private $numProprietaire;
    private $nom;
    private $prenom;
    private $adresse1;
    private $adresse2;
    private $codePostal;
    private $ville;
    private $numTel1;
    private $numTel2;
    private $CAcumule;
    private $email;

    public static $ClassName= "Proprietaire";
    
    /*public function __construct($numProprietaire, $nom, $prenom, $adresse1, $adresse2, $codePostal, $ville, $numTel1, $numTel2, $CAcumule, $email)
    {
        $this->numProprietaire = $numProprietaire;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse1 = $adresse1;
        $this->adresse2 = $adresse2;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->numTel1 = $numTel1;
        $this->numTel2 = $numTel2;
        $this->CAcumule = $CAcumule;
        $this->email = $email;
    }*/

    public function __construct()
    {
        
    }
    
    public static function fromXml($dataXml) {
        $result = new Proprietaire();

        if(isset($dataXml["numProprietaire"])) $result->numProprietaire = strval($dataXml["numProprietaire"]);

            $result->nom = strval($dataXml->nom);
            $result->prenom = strval($dataXml->prenom);
            $result->adresse1 = strval($dataXml->adresse1);
            $result->adresse2 = strval($dataXml->adresse2);
            $result->codePostal = strval($dataXml->codePostal);

            $result->ville = strval($dataXml->ville);
            $result->numTel1 = strval($dataXml->numTel1);
            $result->numTel2 = strval($dataXml->numTel2);
            $result->email = strval($dataXml->email);
            $result->CAcumule = strval($dataXml->CAcumule);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<proprietaire numProprietaire='".$this->numProprietaire."'>\n";
            $result = $result."\t\t\t<nom>".$this->nom."</nom>\n";
            $result = $result."\t\t\t<prenom>".$this->prenom."</prenom>\n";
            $result = $result."\t\t\t<adresse1>".$this->adresse1."</adresse1>\n";
            $result = $result."\t\t\t<adresse2>".$this->adresse2."</adresse2>\n";
            $result = $result."\t\t\t<codePostal>".$this->codePostal."</codePostal>\n";
            $result = $result."\t\t\t<ville>".$this->ville."</ville>\n";

            $result = $result."\t\t\t<numTel1>".$this->numTel1."</numTel1>\n";
            $result = $result."\t\t\t<numTel2>".$this->numTel2."</numTel2>\n";
            $result = $result."\t\t\t<email>".$this->email."</email>\n";
            $result = $result."\t\t\t<CAcumule>".$this->CAcumule."</CAcumule>\n";
        $result = $result."\t\t</proprietaire>\n";
        return $result;
    }

    public function getNumProprietaire()
    {
        return $this->numProprietaire;
    }

    public function setNumProprietaire($numProprietaire)
    {
        $this->numProprietaire = $numProprietaire;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getAdresse1()
    {
        return $this->adresse1;
    }

    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
    }

    public function getAdresse2()
    {
        return $this->adresse2;
    }

    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;
    }

    public function getCodePostal()
    {
        return $this->codePostal;
    }

    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getNumTel1()
    {
        return $this->numTel1;
    }

    public function setNumTel1($numTel1)
    {
        $this->numTel1 = $numTel1;
    }

    public function getNumTel2()
    {
        return $this->numTel2;
    }

    public function setNumTel2($numTel2)
    {
        $this->numTel2 = $numTel2;
    }

    public function getCAcumule()
    {
        return $this->CAcumule;
    }

    public function setCAcumule($CAcumule)
    {
        $this->CAcumule = $CAcumule;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>
