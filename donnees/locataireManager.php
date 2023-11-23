<?php

require_once 'classes/locataire.php';
require_once 'contraintes.php';

class LocataireManager {

    private $xml;
    private $path;
    private $tableName;
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/locataire.xml",777);
        //fopen("/opt/lampp/htdocs/appart/locataire.xml","w");
        $this->tableName = "locataire";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->locataire);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,Locataire::fromXml($this->xml->locataire[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->locataire);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->locataire[$i]["numLocataire"]) == strval($id))
                $result = Locataire::fromXml($this->xml->locataire[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->locataire);;
    }

    public function add(Locataire $locataire) {
        transaction("start",$this->tableName);
        echo $locataire->toXmlString();
        $fileR = fopen($this->path,'r');
        $result = "";

        //contraintes
        if(unicite(simplexml_load_file($this->path)->locataire,"numLocataire",$locataire->getNumLocataire()) == false)
            return;

        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$locataire->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("finish",$this->tableName);
    }

    public function update(Locataire $locataire) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumLocataire()) == strval($locataire->getNumLocataire())){
                $arr[$i] = $locataire;
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }
    
    public function replace_all_with_array($arr) {
        $result = "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>\n\t<".$this->tableName."s>\n";
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            $result = $result.$arr[$i]->toXmlString();
        }
        $result = $result."\t</".$this->tableName."s>\n";

        $fileW = fopen($this->path,"w");
        fputs($fileW, $result);
    }

    public function delete($id) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumLocataire()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }

}
?>
