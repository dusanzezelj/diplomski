<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Vest.class.php';

    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $vest = new Vest($db);
    try {
    $sadrzaj = $db->EscapeString($_POST['sadrzaj']);
    if($vest->updateVest($_POST['id'], $sadrzaj)){
        echo '1';
    } else {
        echo 'Došlo je do greške prilikom ažuriranja vesti';
    }
    
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>
