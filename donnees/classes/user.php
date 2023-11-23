<?php

class User {
    private $idUser;
    private $login;
    private $mdp;
    private $role;

    public static $ClassName= "User";

    public function __construct($assocUser=[]){
        if(isset($assocUser['idUser'])) $this->idUser = $assocUser['idUser'];
        if(isset($assocUser['login'])) $this->login = $assocUser['login'];
        if(isset($assocUser['mdp'])) $this->mdp = $assocUser['mdp'];
        if(isset($assocUser['role'])) $this->role = $assocUser['role'];
    }

    public static function fromXml($dataXml) {
        $result = new User();

        if(isset($dataXml["idUser"])) $result->idUser = strval($dataXml["idUser"]);

            $result->login = strval($dataXml->login);
            $result->mdp = strval($dataXml->mdp);
            $result->role = strval($dataXml->role);

        return $result;
    }
    public function toXmlString(){
        $result = "\t\t<user idUser='".$this->idUser."'>\n";
            $result = $result."\t\t\t<login>".$this->login."</login>\n";
            $result = $result."\t\t\t<mdp>".$this->prixSemBS."</mdp>\n";
            $result = $result."\t\t\t<role>".$this->role."</role>\n";
        $result = $result."\t\t</user>\n";
        return $result;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
