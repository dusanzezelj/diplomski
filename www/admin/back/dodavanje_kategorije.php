<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Obavestenje.class.php';
try {
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $obavestenje = new Obavestenje($db);
    $naziv = $db->EscapeString(trim($_POST['naziv']));
    if ($obavestenje->addKategorija($naziv)){
        header('Location:http://localhost/diplomski/www/admin/obavestenje.php');
    } else {
        throw new Exception("Kategorija sa ovim nazivom već postoji");
    }    
    
} catch (Exception $ex){
    echo $ex->getMessage();
}
?>
