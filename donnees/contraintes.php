<?php
    function unicite($tab,$idName,$id){
        $c=count($tab);
        for ($i=0;$i<$c;$i++) {
            if(strval($tab[$i][$idName]) == strval($id)) return false;
        }
        return true;
    }

    function transaction($etat,$tableName) {
        $path = "/opt/lampp/htdocs/appart/donnees/bd/".$tableName.".xml";
        $backupPath = "/opt/lampp/htdocs/appart/donnees/bd/backup/backup_".$tableName.".xml";
        $transactionEtatPath = "/opt/lampp/htdocs/appart/donnees/bd/backup/transaction_etat_".$tableName.".xml";

        $fileR = fopen($path,"r");        
        $fileW= fopen($backupPath,"w");

        while(!feof($fileR)) {
            fputs($fileW,fgets($fileR));
        }
        
        // $fileTransR = fopen($transactionEtatPath,"r");
        
        // if($etat == "start") {
        //     $fileTransW = fopen($transactionEtatPath,"w");
        //     fputs($fileTransR,"start");
        // else if ($etat == "finish") {}
        //     fputs($fileTransW,"finish");
        // }
    }

    function isTransactionLoading(){
        $fileTransR = fopen($transactionEtatPath,"r");
        $fileTransW = fopen($transactionEtatPath,"w");
        if(fgets($fileTransR) == "start")
            return true;
        else if (fgets($fileTransR) == "finish")
            return false;
    }
?>