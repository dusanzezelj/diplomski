<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';

if(isset($_POST['submit'])){
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
try {
    switch ($_POST['vrsta']) {
        case "predavanja":
                $predmet->upload($_FILES['file'], $_SESSION['predmetID'], $_SESSION['ime_prezime'], "materijali");
            break;
        case "ispitni":
                $predmet->upload($_FILES['file'], $_SESSION['predmetID'], $_SESSION['ime_prezime'], "ispitni_zadaci");
            break;
        case "projekat":
                $predmet->upload($_FILES['file'], $_SESSION['predmetID'], $_SESSION['ime_prezime'], "projekti");
            break;
        default:
            break;
    }
  } catch (Exception $exc) {
    echo $exc->getMessage();
 }

}

?>
