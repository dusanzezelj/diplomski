<?php
require_once '../Class/Predmet.class.php';
require_once '../Class/Db.class.php';
require_once '../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
if(isset($_GET['odsek']) && !(isset($_GET['predmetID']))){
    if($_GET['odsek'] == 'rti'){
        return $predmet->getPredmetByOdsek($_GET['odsek']);        
    } elseif (isset($_GET['odsek']) && isset($_GET['predmetID'])) {
        return $predmet->getPredmetByID($_GET['predmetID']);
} 
    

}
?>
