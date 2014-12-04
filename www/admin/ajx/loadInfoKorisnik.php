<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Zaposlen.class.php';
require_once '../../../Class/Student.class.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$vrsta = $db->EscapeString($_GET['vrsta']);
$id = $db->EscapeString($_GET['id']);
try{
if ($vrsta == "zaposleni") {
    $zaposlen = new Zaposlen($db);
    $korisnik = $zaposlen->getZaposlen($id);
} elseif ($vrsta == "studenti") {
    $student = new Student($db);
    $korisnik = $student->getStudent($id);
}
if(!empty($korisnik)){
echo json_encode($korisnik);
} 
} catch (Exception $ex){
echo $ex->getMessage();
}
?>
