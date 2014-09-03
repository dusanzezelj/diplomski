<?php
require_once '../Class/Db.class.php';
require_once '../inc/mysql.inc.php';
require_once '../Class/Zaposlen.class.php';
require_once '../Class/Student.class.php';
if(isset($_POST['submit'])){
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
     if($_GET['osoba']=='zap'){
        try{   
    $niz = array('username', 'password', 'ime', 'prezime', 'adresa', 'telefon', 'email', 'sajt', 'bio', 'zvanje', 'datum', 'kabinet', 'prijem', 'status');
    foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
    }
    $zaposlen = new Zaposlen($db);
    $id = $zaposlen->dodaj($_POST['username'], $_POST['password'],$_POST['ime'], $_POST['prezime'], $_POST['adresa'], $_POST['telefon'], $_POST['email'], $_POST['sajt'], 
                    $_POST['bio'], $_POST['zvanje'], $_POST['datum'], $_POST['kabinet'], $_POST['prijem'], $_POST['status']);
    echo 'ID zaposlenog je'. $id;
       } catch (Exception $ex){
    echo $ex->getMessage();
        }
    } elseif ($_GET['osoba']=='stud') {
        try {
            $niz = array('username', 'password','indeks', 'studije', 'ime', 'prezime', 'adresa', 'telefon', 'status');
            foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
            }
           //echo 'id studenta je'. $_POST['ime'];
            
            $student = new Student($db);
            $id = $student->dodaj($_POST['username'], $_POST['password'], $_POST['indeks'], $_POST['studije'], $_POST['ime'], $_POST['prezime'], $_POST['adresa'], $_POST['telefon'], $_POST['status']);
            echo 'id studenta je'. $id;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        
    }
    
}
?>

