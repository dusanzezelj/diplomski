<?php
$title = "Pocetna";
$naslov = "Racunarski centar";
require_once 'www/header.php';   
 ?>
<form>
    <label>Korisnicko ime:</label><input type="text" id="username" name="username" required>
    <label>Lozinka:</label><input type="password"  id="password" name="password" required>
    <input type="button" name="submit" id="submit" value="Prijavi se">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="www/js/ajx.js"></script>
</form>
<div id="poruka"></div>
<?php require_once 'www/footer.php'; ?>

