<?php
$title = "Profil";
$naslov ="Profil";
require_once '../header.php';
require_once 'meni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
?>
<div id="profil">
    <?php 
        $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
        $zaposlen = new Zaposlen($db);
        $info = $zaposlen->getZaposlen($_SESSION['id']);        
    ?>
    <label>Adresa:</label><input type="text" name="adresa" value="<?php echo $info['adresa']?>"></br>
    <label>Telefon:</label><input type="text" name="telefon" value="<?php echo $info['telefon']?>"></br>
    <label>Biofrafija:</label><textarea name="bio" rows="7" cols="60"><?php echo $info['biografija']?></textarea></br>
    <label>Kabinet:</label><input type="text" name="kabinet" value="<?php echo $info['kabinet']?>"></br>
    <label>Prijem studenata:</label><textarea name="prijem" rows="5" cols="50"><?php echo $info['prijem_studenata']?></textarea></br>
</div>
<?php require_once '../footer.php';?>

