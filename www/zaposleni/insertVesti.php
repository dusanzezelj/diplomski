<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Vest.class.php';

//if(isset($_POST['submit'])){
   try{
       echo 'Fajl je: ';
      // print_r($_FILES['fajl']);
       
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $vest = new Vest($db);
    $naslov = $db->EscapeString(trim($_POST['naslov']));
    $sadrzaj = $db->EscapeString(trim($_POST['sadrzaj']));
    $datum = date("Y-m-d", strtotime($_POST['datum']));
    if(!empty($_FILES['fajl'])){
        foreach ($_POST['predmeti'] as $id_predmet){
            foreach ($_FILES['fajl'] as $fajl){
            $vest->InsertVest($id_predmet, $naslov, $sadrzaj, $datum, $fajl);
            }
        }
    } else {
        foreach ($_POST['predmeti'] as $id_predmet){
            $vest->InsertVest($id_predmet, $naslov, $sadrzaj, $datum);
        }
    }
    echo 1;
   } catch (Exception $ex){
       echo $ex-getMessage();
   }
//}
?>
