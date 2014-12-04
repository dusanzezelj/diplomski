<?php
require_once 'sesijaAdmin.php';
$title = "Dodela angažovanja";
$naslov = "Dodela angažovanja";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Predmet.class.php';
require_once 'adminMeni.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
 $zaposlen = new Zaposlen($db);
 $predmet = new Predmet($db);
 $zaposleni = $zaposlen->sviZaposleni();
 $predmeti = $predmet->sviPredmeti();
?>
<div id="admin-angazovanja">
    <form class="pure-form pure-form-stacked">           
        <label>Nastavni kadar</label>
        <select name="zaposlen">
            <?php foreach ($zaposleni as $zap): ?>
                <option value="<?php echo $zap['ID']; ?>">
                    <?php echo $zap['ime'] . ' ' . $zap['prezime']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Predmet</label>
        <select name="predmet">
            <?php foreach ($predmeti as $pred): ?>
                <option value="<?php echo $pred['ID']; ?>">
                    <?php echo $pred['naziv']; ?>
                </option>
            <?php endforeach; ?>
        </select>                          
        <label>Grupa</label><input type="text" name="broj" size="2">
        <input class="pure-button pure-button-primary" type="submit" value="Prihvati">        
    </form>
</div>
<?php require_once '../footer.php'; ?>