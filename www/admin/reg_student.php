<?php

$title = "Registracija studenta";
require_once '../header.php';
?>
<h1>Registracija studenta</h1>
<form name="reg_studenta" action="../../admin/registracija.php?osoba=stud" method="post">
<label>Korisnicko ime:</label><input type="text" name="username"></br>
<label>Lozinka:</label><input type="password" name="password"></br>
<label>Indeks:</label><input type="text" name="indeks"></br>
<label>Tip studija:</label><input type="text" name="studije"></br>
<label>Ime:</label><input type="text" name="ime"></br>
<label>Prezime:</label><input type="text" name="prezime"></br
<label>Adresa:</label><input type="text" name="adresa"></br>
<label>Kontakt telefon:</label><input type="text" name="telefon"></br>
<label>Status:</label><select name="status">
    <option value="0">Neaktivan</option>
    <option value="1">Aktivan</option>
</select></br>
<input type="submit" name="submit" value="Registruj">&nbsp;<input type="reset" value="Resetuj">
</form>
<?php
require_once '../footer.php';
?>
