<?php

$title = "Promena lozinke";
$naslov = "Promena lozinke";
require_once 'header.php';
session_start();
?>
<div id="lozinka">
    <?php if(!isset($_SESSION['id'])): ?>
    <h1>Morate biti <a href="../index.php">prijavljeni</a> da bih ste promenili lozinku</h1>  
    <?php else: ?>
    <form class="pure-form pure-form-aligned">
        <div class="pure-control-group">
        <label>Korisničko ime:</label>
        <input type="text" name="username" required>
        </div>
        <div class="pure-control-group">
        <label>Stara lozinka:</label>
        <input type="password" name="stara_lozinka" required>
        </div>
        <div class="pure-control-group">
        <label>Nova lozinka:</label>
        <input type="password" name="nova_lozinka" required>  
        </div>
        <input class="pure-button pure-button-primary" type="submit" value="Prihvati">        
    </form>
    <?php endif; ?>
</div>
<?php require_once 'footer.php';?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/ajx.js"></script>

