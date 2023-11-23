<?php

require_once 'classes/contrat.php';
require_once 'contraintes.php';

class ContratManager {
    private $xml;
    private $path;
    private $tableName;
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/contrat.xml",777);
        //fopen("/opt/lampp/htdocs/appart/contrat.xml","w");
        $this->tableName = "contrat";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->contrat);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,Contrat::fromXml($this->xml->contrat[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->contrat);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->contrat[$i]["numContrat"]) == strval($id))
                $result = Contrat::fromXml($this->xml->contrat[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->contrat);;
    }

    public function add(Contrat $contrat) {
        transaction("start",$this->tableName);
        echo $contrat->toXmlString();
        $fileR = fopen($this->path,'r');
        $result = "";

        //Contraintes
        if(unicite(simplexml_load_file($this->path)->contrat,"numContrat",$contrat->getNumContrat()) == false)
            return;

        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$contrat->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("start",$this->tableName);
    }

    public function update(Contrat $contrat) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumContrat()) == strval($contrat->getNumContrat())){
                $arr[$i] = $contrat;
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("start",$this->tableName);
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
            if(strval($arr[$i]->getNumContrat()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("start",$this->tableName);
    }
}

?>