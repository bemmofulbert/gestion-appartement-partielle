<?php

require_once 'classes/proprietaire.php';
require_once 'contraintes.php';


class ProprietaireManager {
    private $xml;
    private $path;
    private $tableName;
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/proprietaire.xml",777);
        //fopen("/opt/lampp/htdocs/appart/proprietaire.xml","w");
        $this->tableName = "proprietaire";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->proprietaire);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,Proprietaire::fromXml($this->xml->proprietaire[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->proprietaire);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->proprietaire[$i]["numProprietaire"]) == strval($id))
                $result = Proprietaire::fromXml($this->xml->proprietaire[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->proprietaire);;
    }

    public function add(Proprietaire $proprietaire) {
        transaction("start",$this->tableName);
        //echo $proprietaire->toXmlString();
        $fileR = fopen($this->path,'r');
        if(unicite(simplexml_load_file($this->path)->proprietaire,"Proprietaire",$proprietaire->getNumProprietaire()) == false)
            return;
        $result = "";
        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$proprietaire->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("finish",$this->tableName);
    }

    public function update(Proprietaire $proprietaire) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumProprietaire()) == strval($proprietaire->getNumProprietaire())){
                $arr[$i] = $proprietaire;
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
            if(strval($arr[$i]->getNumProprietaire()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }

}

?>