<?php

require_once 'classes/appartement.php';
require_once 'contraintes.php';

class AppartementManager {
    // private $db;
    private $xml;
    private $path;
    private $tableName;
    public static $ClassName = "AppartementManager";
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/appartement.xml",777);
        //fopen("/opt/lampp/htdocs/appart/appartement.xml","w");
        $this->tableName = "appartement";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->appartement);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,Appartement::fromXml($this->xml->appartement[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->appartement);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->appartement[$i]["numLocation"]) == strval($id))
                $result = Appartement::fromXml($this->xml->appartement[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->appartement);;
    }

    public function add(Appartement $appartement) {
        transaction("start",$this->tableName);
        echo $appartement->toXmlString();
        //contraintes
        if(unicite(simplexml_load_file($this->path)->appartement,"numLocation",$appartement->getNumLocation()) == false)
            return;

        $fileR = fopen($this->path,'r');
        $result = "";
        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$appartement->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("finish",$this->tableName);
    }

    public function update(Appartement $appartement) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumLocation()) == strval($appartement->getNumLocation())){
                $arr[$i] = $appartement;
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
            if(strval($arr[$i]->getNumLocation()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }

}

?>