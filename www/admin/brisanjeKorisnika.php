<?php
require_once 'sesijaAdmin.php';
$title = "Brisanje korisnika";
$naslov = "Brisanje korisnika";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Student.class.php';
require_once 'adminMeni.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
 $vrsta = $db->EscapeString($_GET['vrsta']);
 if($vrsta == "zaposleni"){
 $zaposlen = new Zaposlen($db);
 $korisnici = $zaposlen->sviZaposleni();
 } elseif ($vrsta == "studenti") {
     $student = new Student($db);
     $korisnici = $student->sviStudenti();
} 
?>
<div id="brisanjeKorisnika" class="info-korisnik-admin">
    <table class="pure-table pure-table-horizontal">
    <thead>
    <tr>
        <th>Ime</th><th>Prezime</th><th>Indeks\Korisničko ime</th><th></th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($korisnici as $korisnik): ?>
    <tr>
        <td><?php echo $korisnik['ime'] ?></td>
        <td><?php echo $korisnik['prezime'] ?></td>
        <?php if($vrsta == "studenti"): ?>
        <td><?php echo $korisnik['indeks'] ?></td>
        <?php elseif ($vrsta == "zaposleni"): ?>
        <td><?php echo $korisnik['username'] ?></td>
        <?php endif;?>
        <td><a href="back/backBrisanjeKorisnika.php?id=<?php echo $korisnik['ID']?>&vrsta=<?php echo $vrsta?>">Obriši</a></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
</div>
<?php require_once '../footer.php';?>