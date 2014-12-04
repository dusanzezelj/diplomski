<?php
require_once 'sesijaAdmin.php';
$title = "Unos obaveštenja";
$naslov = "Unos obaveštenja";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Obavestenje.class.php';
require_once 'adminMeni.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$obavestenje = new Obavestenje($db);
$kategorije = $obavestenje->getKategorije();

?>
<div class="forma1" id="admin-obavestenja">
    <form class="pure-form pure-form-aligned" action="" method="POST">
        <div class="pure-control-group">
            <label>Odaberite kategoriju:</label>
            <select name="kategorija">
                <?php foreach ($kategorije as $kat): ?>
                    <option value="<?php echo $kat['ID']; ?>">
                        <?php echo $kat['naziv']; ?>
                    </option>
                <?php endforeach; ?>
            </select></div>
        <div class="pure-control-group">
            <label>Sadržaj:</label><textarea class="ckeditor" id="obavestenje" name="sadrzaj"></textarea>           
        </div>
        <input class="pure-button pure-button-primary" type="submit" name="submit" value="Prihvati">
    </form>
</div>
<div class="forma1">
    <h3>Dodavanje nove kategorije</h3>
    <form class="pure-form" action="back/dodavanje_kategorije.php" method="POST">
        <label>Naziv kategorije:</label>
        <input type="text" name="naziv" required>
        <input class="pure-button pure-button-primary" type="submit" value="Prihvati">
    </form>
</div>
<?php require_once '../footer.php'; ?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../ckeditor/ckeditor.js"></script>
<script src="../js/ajx.js"></script>