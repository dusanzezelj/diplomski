
<?php
require_once 'sesijaZaposleni.php';
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
    <form id="forma-vesti" class="pure-form pure-form-stacked" action="" method="POST">
        <label>Naslov vesti:</label>
        <input type="text" name="naslov" required>
        <label>Unesite tekst vesti:</label>
        <div id="edit-vesti">
        <textarea class="ckeditor" id="sadrzaj-vesti" name="sadrzaj-vesti"></textarea>
        <input type="hidden" id="sadrzaj" name="sadrzaj" value="">
        </div>
        <label>Izaberite predmete:</label>
       <?php
        $angazovanje = $predmet->getPredmetByProf($_SESSION['id']);
       ?>
        <select id="predmeti" name="predmeti[]" multiple="multiple" size="4">
        <?php foreach ($angazovanje as $red):?>
          <option value="<?php echo $red['ID'];?>"><?php echo $red['naziv'].' ('.$red['sifra_predmeta'].')'; ?></option>
            <?php endforeach; ?>
    </select>
    <label>Datum:</label><input type="date" name="datum">
    <input type="file" name="fajl">
    <input type="submit" class="button-small pure-button" name="submit" value="Prihvati">
    </form>
</div>

<?php require_once '../footer.php';?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../ckeditor/ckeditor.js"></script>
<script src="../js/ajx.js"></script>