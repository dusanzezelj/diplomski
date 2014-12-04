<?php
require_once 'sesijaZaposleni.php';
$title = "Profil";
$naslov ="Profil";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Publikacija.class.php';
?>
<div id="profil">
    <?php
    
        $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
        $zaposlen = new Zaposlen($db);
        $info = $zaposlen->getZaposlen($_SESSION['id']);
        $zaposleni = $zaposlen->sviZaposleni();
        $publikacija = new Publikacija($db);
        $kat_pub = $publikacija->getKategorije();
    ?>
    <form class="pure-form pure-form-aligned" action="editProfil.php" method="post">
        <div class="pure-control-group"><label>Adresa:</label><input type="text" name="adresa" value="<?php echo $info['adresa']?>"></div>
        <div class="pure-control-group"><label>Telefon:</label><input type="text" name="telefon" value="<?php echo $info['telefon']?>"></div>
       <div class="pure-control-group"><label>Biografija:</label> <div id="bio"><textarea class="ckeditor" name="bio"><?php echo $info['biografija']?></textarea></div></div>
        <div class="pure-control-group"><label>Kabinet:</label><input type="text" name="kabinet" value="<?php echo $info['kabinet']?>"></div>
        <div class="pure-control-group"><label>Prijem studenata:</label><textarea name="prijem" rows="5" cols="50"><?php echo $info['prijem_studenata']?></textarea></div>
        <input type="submit" class="pure-button pure-button-primary" name="submit" value="Prihvati">
    </form>
</div>
<div id="prof-publikacije">
    <h3>Unos publikacije</h3>
    <form class="pure-form pure-form-aligned" method="POST" action="">
        <div class="pure-control-group"><label>Naslov:</label><input type="text" name="naslov"></div>
        <div class="pure-control-group"><label>Autori:</label><select name="autori[]" multiple>
            <?php foreach ($zaposleni as $zap): ?>
                <option value="<?php echo $zap['ime'] . ' ' . $zap['prezime']; ?>"><?php echo $zap['ime'] . ' ' . $zap['prezime']; ?></option>
            <?php endforeach; ?>
            </select></div>
        <div class="pure-control-group"><label>Kategorija:</label><select name="kategorija">
            <?php foreach ($kat_pub as $kp): ?>
                <option value="<?php echo $kp['ID']; ?>"><?php echo $kp['naziv'] ?></option>
            <?php endforeach; ?>
            </select></div>
        <div class="pure-control-group"><label>Ostali autori:</label><textarea name="ostali_autori" colls="12" rows="4"></textarea></div>
        <div class="pure-control-group"><label>Časopis:</label><input type="text" name="casopis"></div>
        <div class="pure-control-group"><label>Apstrakt:</label><input type="file" name="apstrakt"></div>
        <input class="pure-button pure-button-primary" type="submit" value="Prihvati">
    </form>
</div>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../js/ajx.js"></script>

<?php require_once '../footer.php';?>

