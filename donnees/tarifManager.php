<?php

require_once 'classes/tarif.php';
require_once 'contraintes.php';

class TarifManager
{
    private $xml;
    private $path;
    private $tableName;
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/tarif.xml",777);
        //fopen("/opt/lampp/htdocs/appart/tarif.xml","w");
        $this->tableName = "tarif";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->tarif);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,Tarif::fromXml($this->xml->tarif[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->tarif);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->tarif[$i]["codeTarif"]) == strval($id))
                $result = Tarif::fromXml($this->xml->tarif[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->tarif);;
    }

    public function add(Tarif $tarif) {
        transaction("start",$this->tableName);
        echo $tarif->toXmlString();
        $fileR = fopen($this->path,'r');

        //contraintes
        if(unicite(simplexml_load_file($this->path)->tarif,"codeTarif",$tarif->getCodeTarif()) == false)
            return;

        $result = "";
        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$tarif->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("finish",$this->tableName);
    }

    public function update(Tarif $tarif) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getNumTarif()) == strval($tarif->getNumTarif())){
                $arr[$i] = $tarif;
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }
    
    //remplace tout le contenu du fichier par des informations contenu dansun tableau
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
            if(strval($arr[$i]->getNumTarif()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }
}

?>
