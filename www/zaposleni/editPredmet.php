<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';

session_start();
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $predmet = new Predmet($db);
    $id = $db->EscapeString($_GET['predmetID']);
    $pred = $predmet->getPredmetByID($id);
    if(!empty($pred)){ 
        $_SESSION['predmetID'] = $id;
        $a = $pred['cilj'];
        echo json_encode($pred);
      } else {
          echo 0;
      }
?>
