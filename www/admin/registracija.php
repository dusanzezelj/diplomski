<?php
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Student.class.php';
if(isset($_POST['submit'])){
    $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
     if($_POST['osoba']=='zap'){
        try{   
    $niz = array('username', 'password', 'ime', 'prezime', 'adresa', 'telefon', 'email', 'sajt', 'bio', 'zvanje', 'datum', 'kabinet', 'prijem', 'status');
    foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
    }
    $date = date("Y-m-d", strtotime($_POST['datum']));
    $zaposlen = new Zaposlen($db);
    echo $_FILES['slika']['name'];
    exit(1);
    $id = $zaposlen->dodaj($_POST['username'], $_POST['password'],$_POST['ime'], $_POST['prezime'], $_POST['adresa'], $_POST['telefon'], $_POST['email'], $_POST['sajt'], 
                    $_POST['bio'], $_POST['zvanje'], $date, $_POST['kabinet'], $_POST['prijem'], $_POST['status']);
    
    echo 1;
       } catch (Exception $ex){
    echo $ex->getMessage();
        }
    } elseif ($_POST['osoba']=='stud') {
        try {
            $niz = array('username', 'password','indeks', 'studije', 'ime', 'prezime', 'adresa', 'telefon', 'status');
            foreach ($niz as $value) {
        $_POST[$value] = $db->EscapeString(trim($_POST[$value]));
            }           
            $student = new Student($db);
            $id = $student->dodaj($_POST['username'], $_POST['password'], $_POST['indeks'], $_POST['studije'], $_POST['ime'], $_POST['prezime'], $_POST['adresa'], $_POST['telefon'], $_POST['status']);
            echo 1;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
        
    }
?>

