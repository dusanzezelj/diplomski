<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Zaposlen.class.php';
require_once '../../../Class/Student.class.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$vrsta = $db->EscapeString($_GET['vrsta']);
if ($vrsta == "zaposleni") {
    $zaposlen = new Zaposlen($db);
    $korisnici = $zaposlen->sviZaposleni();
} elseif ($vrsta == "studenti") {
    $student = new Student($db);
    $korisnici = $student->sviStudenti();
}
$result = array();
foreach ($korisnici as $korisnik){
    $result[] = array(
        'id' => $korisnik['ID'],
        'ime'=> $korisnik['ime'] . ' ' . $korisnik['prezime']
    );
}
echo json_encode($result);
?>
