<?php
require_once '../Class/Db.class.php';
require_once '../Class/Zaposlen.class.php';
require_once '../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$zaposlen = new Zaposlen($db);
$username = $db->EscapeString($_POST['username']);
$password = $db->EscapeString($_POST['password']);
$res = $zaposlen->prijava($username, $password);
 if(empty($res)){
     echo "greska";
 } else {
     echo "ok";
     /*session_start();
     $_SESSION['id'] = $res['ID'];
     $_SESSION['username']= $res['username'];
     header('Location: zaposleni/profil.php');*/
}
?>

