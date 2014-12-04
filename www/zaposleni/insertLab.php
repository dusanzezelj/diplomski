<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Laboratorija.class.php';
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$lab = new Laboratorija($db);
$broj = $db->EscapeString($_POST['broj']);
$nacin = $db->EscapeString($_POST['nacin']);
try {
    $lab->dodajLaboratoriju($_SESSION['predmetID'], $nacin, $broj);
    echo 1;
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
