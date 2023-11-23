<?php

require_once 'classes/user.php';

class UserManager
{
    private $xml;
    private $path;
    private $tableName;
    
    public function __construct() {

        // $conn = new ConnexionDB();
        // $this->db = $conn->connect();
        //chmod("../../donnees/bd/user.xml",777);
        //fopen("/opt/lampp/htdocs/appart/user.xml","w");
        $this->tableName = "user";
        $this->path = "/opt/lampp/htdocs/appart/donnees/bd/".$this->tableName.".xml";
        $this->xml = simplexml_load_file($this->path);
    }

    public function getList() {
        $array_result = [];
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->user);
        $i=0;
        for($i;$i<$c;$i++){
            array_push($array_result,User::fromXml($this->xml->user[$i]));
        }
        return $array_result;
    }

    public function getUnique($id) {
        $result = null;
        $this->xml = simplexml_load_file($this->path);
        $c=count($this->xml->user);
        $i=0;
        for($i;$i<$c;$i++){
            if(strval($this->xml->user[$i]["idUser"]) == strval($id))
                $result = User::fromXml($this->xml->user[$i]);
        }
        return $result;
    }

    public function count() {
        $this->xml = simplexml_load_file($this->path);
        return count($this->xml->user);;
    }

    public function add(User $user) {
        transaction("start",$this->tableName);
        echo $user->toXmlString();
        $fileR = fopen($this->path,'r');

        //contraintes
        if(unicite(simplexml_load_file($this->path)->user,"idUser",$user->getIdUser()) == false)
            return;

        $result = "";
        while(!feof($fileR)){
            $temp = fgets($fileR);
            if(str_contains($temp,"</".$this->tableName."s>")) break;
            $result = $result.$temp;            
        }
        $result = $result."\n";
        $result = $result.$user->toXmlString();
        $result = $result."\t</".$this->tableName."s>";
        $fileW = fopen($this->path,'w');
        fputs($fileW,$result);
        transaction("finish",$this->tableName);
    }

    public function update(User $user) {
        transaction("start",$this->tableName);
        $arr = $this->getList();
        $c= count($arr);
        for($i=0;$i<$c;$i++){
            if(strval($arr[$i]->getIdUser()) == strval($user->getIdUser())){
                $arr[$i] = $user;
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
            if(strval($arr[$i]->getIdUser()) == strval($id)){                
                unset($arr[$i]);
                break;
            }
        }
        $this->replace_all_with_array($arr);
        transaction("finish",$this->tableName);
    }
}

?>
