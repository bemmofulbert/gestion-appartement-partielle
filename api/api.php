<?php	
    function apiServe($table) {
        require_once "../donnees/classes/".strtolower($table).".php";
        require_once "../donnees/".strtolower($table)."Manager.php";
        $request_method = $_SERVER["REQUEST_METHOD"];
        $managerName = $table."Manager";
        $manager = new $managerName();
        $ClassName = $table::$ClassName;

        switch($request_method)
        {
        case 'GET':
            if(!empty($_GET["id"]))
            {
            $id = $_GET["id"];
            // Récupérer un seul element
            header('Content-Type: application/json');
            $data = (array) $manager->getUnique($id);//->toAssoc();
            //var_dump($data);
            echo str_ireplace("\u0000$ClassName\u0000","",json_encode($data));
            }
            else
            {
            // Récupérer tous les produits
            header('Content-Type: application/json');
            $data = [];
            $raws = $manager->getList();
            $c = count($raws);
            for ($i=0;$i<$c;$i++) {
                array_push($data, (array) $raws[$i]);
            }
            //var_dump($data);
            echo str_ireplace("\u0000$ClassName\u0000","",json_encode($data));
            }
            break;
        default:
            // Requête invalide
            header("HTTP/1.0 405 Method Not Allowed");
            break;
        }
    }
?>
