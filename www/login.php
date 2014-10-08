<?php
require_once '../Class/Db.class.php';
require_once '../Class/Zaposlen.class.php';
require_once '../inc/mysql.inc.php';
try {
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$zaposlen = new Zaposlen($db);
$username = $db->EscapeString($_POST['username']);
$password = $db->EscapeString($_POST['password']);
$res = $zaposlen->prijava($username, $password);
} catch (Exception $e) { echo $e->getMessage();}
 if(empty($res)){
     echo '0';
 } else {
     session_start();
     $_SESSION['id'] = $res['ID'];
     $_SESSION['zap'] = true;
     $_SESSION['username']= $res['username'];
     $_SESSION['ime_prezime']= $res['ime'].' '.$res['prezime'];
     echo '1';
     //header('Location: zaposleni/profil.php');
}
?>

