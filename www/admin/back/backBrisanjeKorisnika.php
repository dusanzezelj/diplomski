<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Zaposlen.class.php';
require_once '../../../Class/Student.class.php';
try {
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $id = $db->EscapeString($_GET['id']);
    $vrsta = $_GET['vrsta'];
    if ($vrsta == "zaposleni") {
        $zaposlen = new Zaposlen($db);
        $zaposlen->obrisi($id);
    } elseif ($vrsta == "studenti") {
        $student = new Student($db);
        $student->obrisi($id);
    }
    header("Location: ../brisanjeKorisnika.php?vrsta=$vrsta");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>