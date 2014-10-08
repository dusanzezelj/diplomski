<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString(trim($_GET['id']));
try {
    switch ($_GET['vrsta']) {
        case "predavanja":
            $predmet->deleteMaterijal($id, "materijali");
            break;
        case "ispitni":
            $predmet->deleteMaterijal($id, "ispitni_zadaci");
            break;
        case "projekti":
            $predmet->deleteMaterijal($id, "projekti");
            break;
        default:
            break;
    }
    
    /*if($_GET['vrsta'] == "predavanja"){
    $predmet->deleteMaterijal($id, "materijali");
    header("Location: materijali.php");
   } elseif ($_GET['vrsta'] == "ispitni") {
       $predmet->deleteMaterijal($id, "ispitni_zadaci");
       header("Location: materijali.php");
   }*/
    
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
