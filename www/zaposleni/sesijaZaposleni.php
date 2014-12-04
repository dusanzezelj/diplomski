<?php
session_start();
if($_SESSION['zap'] != true && $_SESSION['vrsta'] != "nastavnik"){
    header("Location: http://localhost/diplomski/index.php");
}
?>
