<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Laboratorija.class.php';
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$lab = new Laboratorija($db);
$naziv = $db->EscapeString($_POST['naziv']);
try {
    $labID = $lab->postojeVezbe($_POST['predmet']);
    $lab->upload($_FILES['file'], $naziv, $_POST['predmet'], $labID, $_SESSION['ime_prezime']);
    echo 1;
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
