<?php

session_start();
if($_SESSION['zap'] != false && $_SESSION['vrsta'] != "student"){
    header("Location: http://localhost/diplomski/index.php");
}
?>
