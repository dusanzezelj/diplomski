<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Obavestenje.class.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$obavestenje = new Obavestenje($db);
$sadrzaj = $db->EscapeString($_POST['sadrzaj']);
try {
    $obavestenje->addObavestenje($_POST['kat'], $sadrzaj);
    echo 1;
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
