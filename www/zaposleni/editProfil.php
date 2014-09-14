<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
session_start();
if(isset($_POST['submit'])){
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $zaposlen = new Zaposlen($db);
   try{   
    $niz = array('adresa', 'telefon', 'bio', 'kabinet', 'prijem');
    foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
    }
        $zaposlen->editZaposlen($_SESSION['id'], $_POST['adresa'], $_POST['telefon'], $_POST['bio'], $_POST['kabinet'], $_POST['prijem']);        
     } catch (Exception $ex) { echo $ex->getMessage();}     
  }
?>
