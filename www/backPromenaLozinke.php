<?php

require_once '../Class/Db.class.php';
require_once '../Class/Zaposlen.class.php';
require_once '../Class/Student.class.php';
require_once '../Class/Admin.class.php';
require_once '../inc/mysql.inc.php';
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$username = $db->EscapeString(trim($_POST['username']));
$old_password = $db->EscapeString(trim($_POST['stara_lozinka']));
$new_password = $db->EscapeString(trim($_POST['nova_lozinka']));
try {
    if ($_SESSION['zap'] == true && $_SESSION['vrsta'] == "nastavnik") {
        $zaposlen = new Zaposlen($db);
        $zaposlen->promenaLozinke($username, $old_password, $new_password);
        echo 1;
    } elseif ($_SESSION['zap'] == true && $_SESSION['vrsta'] == "admin") {
        $admin = new Admin($db);
        $admin->promenaLozinke($username, $old_password, $new_password);
        echo 1;
    } elseif ($_SESSION['zap'] == false && $_SESSION['vrsta'] == "student") {
        $student = new Student($db);
        $student->promenaLozinke($username, $old_password, $new_password);
        echo 1;
    } else {
        throw new Exception("Došlo je do greške prilikom promene lozinke");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
