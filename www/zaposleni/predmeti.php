<?php
$title = "Predmeti";
$naslov ="Predmeti";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Predmet.class.php';
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$angazovanje = $predmet->getPredmetByProf($_SESSION['id']);
?>
<div id="prof-predmet-izbor">
    <label>Podešavanje predmeta:</label><select id="izbor-predmeta">
        <?php foreach ($angazovanje as $red):?>
        <option value="<?php echo $red['ID'];?>"><?php echo $red['naziv'].' ('.$red['sifra_predmeta'].')'; ?></option>
            <?php endforeach; ?>
    </select>
    <input type="button" id="izbor" name="izbor" value="Izaberi"><br>
</div>
<div id="prof-predmet-edit">
    <form id="pforma" method="post">
    <label>Status predmeta:</label><select name="status">
        <option value="izborni">Izborni</option>
        <option value="obavezni">Obavezni</option>
    </select><br>
    <input type="hidden" name="id" value="">
    <label>Godina:</label><input type="text" name="godina"><br>
    <label>Odsek:</label><input type="text" name="odsek"><br>
    <label>Šifra predmeta:</label><input type="text" name="sifra"><br>
    <label>Fond časova:</label><input type="text" name="fond"><br>
    <label>ESPB:</label><input type="text" name="espb" size="3"><br>
    <label>Uslov:</label><textarea class="ckeditor" name="uslov" id="uslov"></textarea><br>
    <label>Cilj predmeta:</label><textarea class="ckeditor" name="cilj" id="cilj"></textarea><br>
    <label>Termin vežbi:</label><textarea name="vezbe" id="vezbe"></textarea><br>
    <label>Termin predavanja:</label><textarea name="predavanja" id="predavanja"></textarea><br>
    <input type="submit" name="submit" value="Prihvati">
    </form>
</div>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../js/ajx.js"></script>
<?php require '../footer.php';?>
