<?php

require_once '../Class/Db.class.php';
require_once '../Class/Zaposlen.class.php';
require_once '../Class/Student.class.php';
require_once '../Class/Admin.class.php';
require_once '../inc/mysql.inc.php';

try {
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $zaposlen = new Zaposlen($db);
    $username = $db->EscapeString(trim($_POST['username']));
    $password = $db->EscapeString(trim($_POST['password']));
    if ($_POST['tip'] == "zaposlen" && $_POST['vrsta'] == "nastavnik") {
        $zaposlen = new Zaposlen($db);
        $res = $zaposlen->prijava($username, $password);
        if (!empty($res)) {
            session_start();
            $_SESSION['id'] = $res['ID'];
            $_SESSION['zap'] = true;
            $_SESSION['vrsta'] = "nastavnik";
            $_SESSION['username'] = $res['username'];
            $_SESSION['ime_prezime'] = $res['ime'] . ' ' . $res['prezime'];
            echo '1';
        }
    } elseif ($_POST['tip'] == "zaposlen" && $_POST['vrsta'] == "admin") {
        $admin = new Admin($db);
        $res = $admin->prijava($username, $password);
        if (!empty($res)) {
            session_start();
            $_SESSION['id'] = $res['ID'];
            $_SESSION['zap'] = true;
            $_SESSION['vrsta'] = "admin";
            $_SESSION['username'] = $res['username'];            
            echo '2';
        }
    } elseif ($_POST['tip'] == "student") {
        $student = new Student($db);
        $res = $student->prijava($username, $password);
        if (!empty($res)) {
            session_start();
            $_SESSION['id'] = $res['ID'];
            $_SESSION['zap'] = false;
            $_SESSION['vrsta'] = "student";
            $_SESSION['username'] = $res['username'];
            $_SESSION['ime_prezime'] = $res['ime'] . ' ' . $res['prezime'];
            echo '3';
        }
    } else {
        throw new Exception("Greška u obradi podataka");
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>

