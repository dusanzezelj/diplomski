<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Vest.class.php';
require_once '../../Class/Predmet.class.php';
session_start();

   try{           
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $vest = new Vest($db);
    $predmet = new Predmet($db);
    $odsek = $predmet->getOdsek($_SESSION['predmetID']);
    $naslov = $db->EscapeString(trim($_POST['naslov']));
    $sadrzaj = $db->EscapeString(trim($_POST['sadrzaj']));
    $datum = date("Y-m-d", strtotime($_POST['datum']));
    if(!empty($_FILES['fajl'])){
        foreach ($_POST['predmeti'] as $id_predmet){
            foreach ($_FILES['fajl'] as $fajl){
            $vest->InsertVest($id_predmet, $odsek, $naslov, $sadrzaj, $datum, $fajl);
            }
        }
    } else {
        foreach ($_POST['predmeti'] as $id_predmet){
            $vest->InsertVest($id_predmet, $odsek, $naslov, $sadrzaj, $datum);
        }
    }
    echo 1;
   } catch (Exception $ex){
       echo $ex-getMessage();
   }
//}
?>
