<?php
$title = "Registracija zaposlenih";
$naslov = "Registracija zaposlenih";
require_once '../header.php';
require_once 'adminMeni.php';
?>
<div class="unos-korisnika">
<form class="pure-form pure-form-aligned" id="registracija-zaposleni" name="reg_zap" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="osoba" value="zap">
     <div class="pure-control-group">
    <label>Korisničko ime:</label><input type="text" name="username">
     </div>
     <div class="pure-control-group">
    <label>Lozinka:</label><input type="password" name="password">
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
    <label>E-mail:</label><input type="text" name="email">
     </div>
     <div class="pure-control-group">
    <label>Lični web sajt:</label><input type="text" name="sajt">
     </div>
     <div class="pure-control-group">
         <label>Biografija:</label><textarea name="bio" class="ckeditor"></textarea>
     </div>
     <div class="pure-control-group">
    <label>Zvanje:</label><select name="zvanje">
        <option value="redovni profesor">redovni profesor</option>
        <option value="vanredni profesor">vanredni profesor</option>
        <option value="docent">docent</option>
        <option value="asistent">asistent</option>
        <option value="saradnik u nastavi">saradnik u nastavi</option>
        <option value="istraživač">istraživač</option>
        <option value="laboratorijski inženjer">laboratorijski inženjer</option>
        <option value="laboratorijski tehničar">laboratorijski tehničar</option>    
    </select>
     </div>
     <div class="pure-control-group">
    <label>Datum isteka ugovora(gggg-mm-dd):</label> <input type="text" name="datum">
     </div>
     <div class="pure-control-group">
    <label>Kabinet:</label><input type="text" name="kabinet">
     </div>
     <div class="pure-control-group">
         <label>Prijem studenata:</label><textarea name="prijem" class="ckeditor"></textarea>
     </div>
     <div class="pure-control-group">
    <label>Status:</label><select name="status">
        <option value="0">Neaktivan</option>
        <option value="1">Aktivan</option>
    </select>
     </div>
     <div class="pure-control-group">
    <label>Dodaj sliku:</label><input type="file" name="slika">
     </div>
     <input class="pure-button-primary pure-button" type="submit" name="submit" value="Registruj">
     <input class="button-error pure-button" type="reset" value="Resetuj">
</form>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../ckeditor/ckeditor.js"></script>
<script>
    $("#registracija-zaposleni").submit(function (e){
        e.preventDefault();
        alert("kliknuto");
        console.log("kliknuto");
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
           }
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