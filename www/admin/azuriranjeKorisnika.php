<?php
require_once 'sesijaAdmin.php';
$title = "Ažuriranje korisnika";
$naslov = "Ažuriranje korisnika";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Obavestenje.class.php';
require_once 'adminMeni.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
?>

<div id="azuriranje-korisnika">
    <form class="pure-form">
        <input type="radio" name="vrsta" value="zaposleni">Zaposleni&nbsp;
        <input type="radio" name="vrsta" value="studenti">Studenti&nbsp;
        <select id="korisnici" name="korisnik">           
        </select>&nbsp;
        <input class="pure-button" type="button" id="dugme-korisnik" value="Odaberi">
    </form>
</div>
<div class="info-korisnik-admin" id="azuriranje-zaposlen">
    <form id="form-azuriranje-zaposlen" class="pure-form pure-form-aligned">
    <input type="hidden" name="id">
    <div class="pure-control-group"><label>Ime:</label><input type="text" name="ime"></div>
    <div class="pure-control-group"><label>Prezime:</label><input type="text" name="prezime" ></div>
    <div class="pure-control-group"><label>Korisnickčko ime:</label><input type="text" name="username"></div>
    <div class="pure-control-group"><label>Zvanje:</label><input type="text" name="zvanje"></div>
    <div class="pure-control-group"><label>Datum isteka ugovora(gggg-mm-dd):</label><input type="text" name="datum"></div>
    <input class="pure-button pure-button-primary" type="submit" value="Prihvati">
    </form>
</div>
<div class="info-korisnik-admin" id="azuriranje-student">
    <form id="form-azuriranje-student" class="pure-form pure-form-aligned">
    <input type="hidden" name="id">
    <div class="pure-control-group"><label>Ime:</label><input type="text" name="ime"></div>
    <div class="pure-control-group"><label>Prezime:</label><input type="text" name="prezime"></div>
    <div class="pure-control-group"><label>Korisnickčko ime:</label><input type="text" name="username"></div>
    <div class="pure-control-group"><label>Indeks:</label><input type="text" name="indeks"></div>
    <div class="pure-control-group"><label>Tip studija:</label><input type="text" name="tip"></div>
    <div class="pure-control-group"><label>Adresa:</label><input type="text" name="adresa"></div>
    <div class="pure-control-group"><label>Telefon:</label><input type="text" name="telefon" value=""></div>   
    <input class="pure-button pure-button-primary" type="submit" value="Prihvati">
    </form>
</div>
<?php require_once '../footer.php'; ?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../js/ajx.js"></script>
