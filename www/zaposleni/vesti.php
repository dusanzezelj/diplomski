
<?php
require_once '../sesijaZaposleni.php';
$title = "Obaveštenja";
$naslov ="Obaveštenja";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
require_once '../../Class/Vest.class.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$vesti= new Vest($db);
?>

<div id="spisak-vesti">
       
</div>
<div id="unos-vesti">
    <form id="forma-vesti" action="" method="POST">
        <label>Naslov vesti:</label><br>
        <input type="text" name="naslov" required><br>
        <label>Unesite tekst vesti:</label><br>
        <div id="edit-vesti">
        <textarea id="sadrzaj-vesti" name="sadrzaj-vesti"></textarea>
        <input type="hidden" id="sadrzaj" name="sadrzaj" value="">
        </div><br>
        <label>Izaberite predmete:</label><br>
       <?php
        $angazovanje = $predmet->getPredmetByProf($_SESSION['id']);
       ?>
        <select id="predmeti" name="predmeti[]" multiple="multiple" size="4">
        <?php foreach ($angazovanje as $red):?>
          <option value="<?php echo $red['ID'];?>"><?php echo $red['naziv'].' ('.$red['sifra_predmeta'].')'; ?></option>
            <?php endforeach; ?>
    </select><br>
    <label>Datum:</label><input type="date" name="datum"><br>
    <input type="file" name="fajl"><br>
    <input type="submit" name="submit" value="Prihvati">
    </form>
</div>

<?php require_once '../footer.php';?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../ckeditor/ckeditor.js"></script>
<script src="../js/ajx.js"></script>