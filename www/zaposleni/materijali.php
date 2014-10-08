<?php
session_start();
if(!isset($_SESSION['predmetID'])){
    header('Location:predmeti.php');
}
$title = "Materijali";
$naslov ="Materijali";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
//session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$materijali = $predmet->getMaterijal($_SESSION['predmetID']); ?>
<div id="forma-dodavanje-materijal">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Materijal:</label><input type="file" name="file">
         <input type="hidden" name="vrsta" value="predavanja">
        <input type="submit" name="submit" value="Odaberi">
    </form>
</div>
<?php if(!empty($materijali)): ?>
  <div id="table-materijali">
    <table>
        <tr><th>Naziv</th><th>Tip</th><th>Datum postavljanja</th><th>Veličina</th><th>Nastavnik</th><th>Brisanje</th></tr>
    <?php foreach ($materijali as $materijal): ?>
        <tr>
            <td><?php echo $materijal['naziv']?></td>
            <td><?php echo $materijal['tip']?></td>
            <td><?php echo $materijal['datum']?></td>
            <td><?php echo $materijal['velicina']?></td>
            <td><?php echo $materijal['autor']?></td>
            <td><a id="obrisi-mat" href="brisanjeMat.php?id=<?php echo $materijal['ID']?>&vrsta=predavanja">Obriši</a></td>
        </tr>
    <?php endforeach; ?>    
    </table>
  </div>
<?php endif; ?>
<?php require_once '../footer.php';?>

