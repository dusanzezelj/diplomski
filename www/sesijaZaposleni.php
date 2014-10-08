<?php

session_start();
If((!isset($_SESSION['id'])) || (!isset($_SESSION['zap']))){
    header("Location: ../index.php");
}
?>
