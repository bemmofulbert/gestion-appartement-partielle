<?php



require_once('../../donnees/appartementManager.php');

$appartementManager = new AppartementManager();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $appart = $appartementManager->getUnique($id);
    if($appart == null) $listAppartement = null;
    else $listAppartement = [$appart];
}
else{
    $listAppartement = $appartementManager->getList();
}

//include get_correct_path('presentation/impression/listeLocations.php');

?>