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
        <option value="<?php echo $red['ID'];?>"><?php echo $red['naziv'].' ('.$red['sifra_predmeta'].')'; ?>
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
    <label>Šifra predmeta:</label><input type="text" name="sifra"><br>
    <label>ESPB:</label><input type="text" name="espb" size="3"><br>
    <label>Uslov:</label><textarea name="uslov" id="uslov" rows="6" cols="40"></textarea><br>
    <label>Cilj predmeta:</label><textarea name="cilj" id="cilj" rows="6" cols="40"></textarea><br>
    <input type="submit" name="prihvati" value="Prihvati">
    </form>
</div>
 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/ajx.js"></script>
<?php require '../footer.php';?>
