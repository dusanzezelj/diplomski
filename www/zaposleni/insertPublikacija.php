<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Publikacija.class.php';

try {
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $publikacija = new Publikacija($db);
    $naslov = $db->EscapeString($_POST['naslov']);
    $ostali_autori = $db->EscapeString($_POST['ostali_autori']);
    $casopis = $db->EscapeString($_POST['casopis']);
    if ($ostali_autori != "" && !(empty($_POST['autori']))) {
        $autori = implode(',', $_POST['autori']);
        $autori .= ',' . $ostali_autori;
        $autori_niz = explode(',', $autori);
    } elseif ($ostali_autori != "" && empty($_POST['autori'])) {
        $autori_niz = explode(',', $ostali_autori);
    } else {
        $autori_niz = $_POST['autori'];
    }
    $pId = $publikacija->dodajPublikaciju($naslov, $_POST['kategorija'], $casopis);
    $publikacija->dodajAutore($pId, $autori_niz);
    if (!empty($_FILES['apstrakt']) && $_FILES['apstrakt'] != null && $_FILES['apstrakt']['name'] != "") {
        $publikacija->dodajApstrakt($pId, $_FILES['apstrakt']);
    }
    echo 1;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
