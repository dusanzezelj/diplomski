<?php
$title = "Registracija zaposlenih";
$naslov = "Registracija zaposlenih";
require_once '../header.php';
?>
<form id="registracija-zaposleni" name="reg_zap" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="osoba" value="zap">
    <label>Korisničko ime:</label><input type="text" name="username"></br>
    <label>Lozinka:</label><input type="password" name="password"></br>
    <label>Ime:</label><input type="text" name="ime"></br>
    <label>Prezime:</label><input type="text" name="prezime"></br
    <label>Adresa:</label><input type="text" name="adresa"></br>
    <label>Kontakt telefon:</label><input type="text" name="telefon"></br>
    <label>E-mail:</label><input type="text" name="email"></br>
    <label>Lični web sajt:</label><input type="text" name="sajt"></br>
    <label>Biografija:</label><textarea name="bio" rows="7" cols="60"></textarea></br>
    <label>Zvanje:</label><select name="zvanje">
        <option value="redovni profesor">redovni profesor</option>
        <option value="vanredni profesor">vanredni profesor</option>
        <option value="docent">docent</option>
        <option value="asistent">asistent</option>
        <option value="saradnik u nastavi">saradnik u nastavi</option>
        <option value="istraživač">istraživač</option>
        <option value="laboratorijski inženjer">laboratorijski inženjer</option>
        <option value="laboratorijski tehničar">laboratorijski tehničar</option>    
    </select></br>
    <label>Datum isteka ugovora(gggg-mm-dd):</label> <input type="text" name="datum"></br>
    <label>Kabinet:</label><input type="text" name="kabinet"></br>
    <label>Prijem studenata:</label><textarea name="prijem" rows="5" cols="50"></textarea></br>
    <label>Status:</label><select name="status">
        <option value="0">Neaktivan</option>
        <option value="1">Aktivan</option>
    </select></br>
    <label>Dodaj sliku:</label><input type="file" name="slika"></br>
    <input type="submit" name="submit" value="Registruj">&nbsp;<input type="reset" value="Resetuj">
</form>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $("#registracija-zaposleni").submit(function (e){
        e.preventDefault();
        alert("kliknuto");
        console.log("kliknuto");
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'registracija.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data == 1){
                alert("Zaposleni je uspešno dodat");
                } else {
                    alert(data);
                }
            }            
        });
    });
</script>
<?php
require_once '../footer.php';
?>