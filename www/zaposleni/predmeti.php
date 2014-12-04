<?php
require_once 'sesijaZaposleni.php';
$title = "Predmeti";
$naslov ="Predmeti";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$angazovanje = $predmet->getPredmetByProf($_SESSION['id']);
?>
<div class="pure-form" id="prof-predmet-izbor">
    <label>Izbor predmeta: </label><select id="izbor-predmeta">
        <?php foreach ($angazovanje as $red):?>
        <option value="<?php echo $red['ID'];?>"><?php echo $red['naziv'].' ('.$red['sifra_predmeta'].')'; ?></option>
            <?php endforeach; ?>
    </select>
    <input type="button" class="pure-button" id="izbor" name="izbor" value="Izaberi"><br>
</div>
<div id="prof-predmet-edit">
    <form id="pforma" class="pure-form pure-form-aligned" method="post">
    <div class="pure-control-group">
        <label>Status predmeta:</label><select name="status">
        <option value="izborni">Izborni</option>
        <option value="obavezni">Obavezni</option>
    </select>
    </div>
    <input type="hidden" name="id" value="">
    <div class="pure-control-group">
    <label>Godina:</label><input type="text" name="godina">
    </div>
    <div class="pure-control-group">
    <label>Odsek:</label><input type="text" name="odsek">
    </div>
    <div class="pure-control-group">
    <label>Šifra predmeta:</label><input type="text" name="sifra">
    </div>
    <div class="pure-control-group">
    <label>Fond časova:</label><input type="text" name="fond">
    </div>
    <div class="pure-control-group">
    <label>ESPB:</label><input type="text" name="espb" size="3">
    </div>
    <label>Uslov:</label><textarea class="ckeditor" name="uslov" id="uslov"></textarea><br>
    <label>Cilj predmeta:</label><textarea class="ckeditor" name="cilj" id="cilj"></textarea><br>
    <div class="pure-control-group">
    <label>Termin vežbi:</label><textarea name="vezbe" id="vezbe"></textarea>
    </div>
    <div class="pure-control-group">
    <label>Termin predavanja:</label><textarea name="predavanja" id="predavanja"></textarea>
    </div>
    <input type="submit" class="pure-button" name="submit" value="Prihvati">
    </form>
</div>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../js/ajx.js"></script>
<?php require '../footer.php';?>
