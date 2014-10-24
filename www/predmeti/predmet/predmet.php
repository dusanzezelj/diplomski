<?php

$title = "Osnovne studije";
$naslov = "Osnovne studije";
require_once '../../header.php';
require_once '../../../Class/Predmet.class.php';
require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString($_GET['id']);
$pred = $predmet->getPredmetByID($id);
$prof = $predmet->getProfesor($id);
?>
<?php require_once 'meniPredmet.php';?>
<div id="info-predmet">
<table>
    <tr><th>O predmetu</th></tr>
    <tr><td>Naziv predmeta</td><td><?php echo $pred['naziv']?></td></tr>
    <tr><td>Nastavnik</td><td><?php echo $prof?></td></tr>
    <tr><td>Status predmeta</td><td><?php echo $pred['tip']?></td></tr>
    <tr><td>Godina</td><td><?php echo $pred['godina']?></td></tr>
    <tr><td>Semestar</td><td><?php echo $pred['semestar']?></td></tr>   
    <tr><td>Šifra predmeta</td><td><?php echo $pred['sifra_predmeta']?></td></tr>
    <tr><td>ESPB</td><td><?php echo $pred['espb']?></td></tr>
    <tr collspan="2"><td>Uslov predmeta:<p>echo <?php $pred['uslov']?></p></td></tr>
    <tr collspan="2"><td>Cilj predmeta:<p>echo <?php $pred['cilj']?></p></td></tr>
    <tr><td>Fond časova</td><td><?php echo $pred['fond_casova']?></td></tr>
    <tr><td>Termin predavanja:</td><td>Termin vežbi:</td></tr>
    <tr><td><?php $pred['termin_predavanja']?></td><td><?php $pred['termin_vezbe']?></td></tr>
</table>
</div>
<?php require_once '../../footer.php'; ?>