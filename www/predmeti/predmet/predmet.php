<?php

$title = "Osnovne studije";
$naslov = "Osnovne studije";
require_once 'includes.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString($_GET['id']);
require_once 'meniPredmet.php';
$pred = $predmet->getPredmetByID($id);
$profesori = $predmet->getProfesor($id);
?>
<?php require_once 'meniPredmet.php';?>
<div id="info-predmet">
    <table class="pure-table pure-table-horizontal">
        <thead>
            <tr><th colspan="2">O predmetu</th></tr>
        </thead>
        <tbody>
        <tr><td class="kolona1">Naziv predmeta</td><td><?php echo $pred['naziv'] ?></td></tr>
        <tr><td class="kolona1">Nastavnik</td><td><?php foreach ($profesori as $prof): ?>
                   <a href="../nastavnik.php?id=<?php echo $prof['ID']?>"><?php echo $prof['ime'].' '.$prof['prezime'].'<br>'?></a>
                <?php endforeach; ?></td></tr>
        <tr><td class="kolona1">Status predmeta</td><td><?php echo $pred['tip'] ?></td></tr>
        <tr><td class="kolona1">Godina</td><td><?php echo $pred['godina'] ?></td></tr>
        <tr><td class="kolona1">Semestar</td><td><?php echo $pred['semestar'] ?></td></tr>   
        <tr><td class="kolona1">Šifra predmeta</td><td><?php echo $pred['sifra_predmeta'] ?></td></tr>
        <tr><td class="kolona1">ESPB</td><td><?php echo $pred['espb'] ?></td></tr>
        <tr><td colspan="2">Uslov predmeta:<p><?php echo $pred['uslov'] ?></p></td></tr>
        <tr><td colspan="2">Cilj predmeta:<p><?php echo $pred['cilj'] ?></p></td></tr>
        <tr><td class="kolona1">Fond časova</td><td><?php echo $pred['fond_casova'] ?></td></tr>
        <tr><td>Termin predavanja:</td><td>Termin vežbi:</td></tr>
        <tr><td><?php $pred['termin_predavanja'] ?></td><td><?php $pred['termin_vezbe'] ?></td></tr>
        </tbody>
    </table>
</div>
<?php require_once '../../footer.php'; ?>