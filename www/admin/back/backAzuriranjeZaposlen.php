<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Zaposlen.class.php';

try{
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $zaposlen = new Zaposlen($db);
    $id = $db->EscapeString($_POST['id']);
    $ime = $db->EscapeString($_POST['ime']);
    $prezime = $db->EscapeString($_POST['prezime']);
    $username = $db->EscapeString($_POST['username']);
    $zvanje = $db->EscapeString($_POST['zvanje']);
    $datum = $db->EscapeString($_POST['datum']);
    $zaposlen->adminAzuriranje($id, $ime, $prezime, $username, $zvanje, $datum);
    echo 1;
}  catch (Exception $ex){
    echo $ex->getMessage();
}
?>
