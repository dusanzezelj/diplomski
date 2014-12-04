<?php
require_once 'sesijaZaposleni.php';
if(!isset($_SESSION['predmetID'])){
    header('Location:predmeti.php');
}
$title = "Projekti";
$naslov ="Projekti";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$projekti = $predmet->getProjekti($_SESSION['predmetID']); ?>
<div id="forma-dodavanje-materijal">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Projekat:</label><input type="file" name="file">
         <input type="hidden" name="vrsta" value="projekat">
        <input type="submit" class="button-small pure-button" name="submit" value="Odaberi">
    </form>
</div>
<?php if(!empty($projekti)): ?>
  <div class="sadrzaj-nastavnik" id="table-materijali">
    <table class="pure-table pure-table-horizontal">
        <thead>
        <tr>
            <th  style="width: 160px;">Naziv</th><th>Tip</th><th>Datum postavljanja</th><th>Veličina</th><th>Nastavnik</th><th>Brisanje</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($projekti as $projekat): ?>
        <tr>
            <td><?php echo $projekat['naziv']?></td>
            <td><?php echo $projekat['tip']?></td>
            <td><?php echo $projekat['datum']?></td>
            <td><?php echo $projekat['velicina']?></td>
            <td><?php echo $projekat['autor']?></td>
            <td><a id="obrisi-mat" href="brisanjeMat.php?id=<?php echo $materijal['ID']?>&vrsta=projekti">Obriši</a></td>
        </tr>
    <?php endforeach; ?>    
        </tbody>
    </table>
  </div>
<?php endif; ?>
<?php require_once '../footer.php';?>
?>
