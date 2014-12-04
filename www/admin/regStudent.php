<?php

$title = "Registracija studenta";
$naslov = "Registracija studenta";
require_once '../header.php';
require_once 'adminMeni.php';
?>
<div class="unos-korisnika">
<form class="pure-form pure-form-aligned" id="registracija-student" name="reg_studenta" action="" method="post">
    <input type="hidden" name="osoba" value="stud">
     <div class="pure-control-group">
<label>Korisnicko ime:</label><input type="text" name="username">
     </div>
     <div class="pure-control-group">
<label>Lozinka:</label><input type="password" name="password">
     </div>
     <div class="pure-control-group">
<label>Indeks:</label><input type="text" name="indeks">
     </div>
     <div class="pure-control-group">
<label>Tip studija:</label><input type="text" name="studije">
     </div>
     <div class="pure-control-group">
<label>Ime:</label><input type="text" name="ime">
     </div>
     <div class="pure-control-group">
<label>Prezime:</label><input type="text" name="prezime">
     </div>
     <div class="pure-control-group">
<label>Adresa:</label><input type="text" name="adresa">
     </div>
     <div class="pure-control-group">
<label>Kontakt telefon:</label><input type="text" name="telefon">
     </div>
     <div class="pure-control-group">
<label>Status:</label><select name="status">
    <option value="0">Neaktivan</option>
    <option value="1">Aktivan</option>
</select>
     </div>     
    <input class="pure-button-primary pure-button" type="submit" name="submit" value="Registruj">
    <input class="button-error pure-button" type="reset" value="Resetuj">
</form>
</div>
<?php
require_once '../footer.php';
?>
