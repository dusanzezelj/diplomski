<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
 $zaposlen = new Zaposlen($db);
 $grupa = $db->EscapeString($_POST['broj']);
 try {
    $zaposlen->addAngazovanje($_POST['zaposlen'], $_POST['predmet'], $grupa);
    echo 1;
} catch (Exception $exc) {
    echo $exc->getMessage();
}

 

