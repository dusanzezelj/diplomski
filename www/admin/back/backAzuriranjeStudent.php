<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Zaposlen.class.php';

try {
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $student = new Student($db);
    $id = $db->EscapeString($_POST['id']);
    $ime = $db->EscapeString($_POST['ime']);
    $prezime = $db->EscapeString($_POST['prezime']);
    $username = $db->EscapeString($_POST['username']);
    $indeks = $db->EscapeString($_POST['indeks']);
    $tip = $db->EscapeString($_POST['tip']);
    $adresa = $db->EscapeString($_POST['adresa']);
    $telefon = $db->EscapeString($_POST['telefon']);
    $student->adminAzuriranje($id, $ime, $prezime, $username, $indeks, $tip, $adresa, $telefon);
    echo 1;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
