<?php

require_once '../sesijaZaposleni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Vest.class.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$vest = new Vest($db);
$id = (int)$db->EscapeString(trim($_GET['ID']));
try {
    $vest->deleteVest($id);
    echo 1;
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
