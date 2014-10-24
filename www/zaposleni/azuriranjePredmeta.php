<?php

require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
require_once '../sesijaZaposleni.php';


    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $predmet = new Predmet($db);
    try{   
    $niz = array('godina', 'odsek', 'sifra', 'fond', 'espb', 'uslov', 'cilj', 'vezbe', 'predavanja');
    foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
        }
        if($predmet->updatePredmet($_POST['id'], $_POST['status'], $_POST['godina'], $_POST['odsek'], $_POST['sifra'],
                                $_POST['fond'], $_POST['espb'], $_POST['cilj'], $_POST['uslov'], $_POST['vezbe'], $_POST['predavanja'])){
            echo '1';
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

?>
