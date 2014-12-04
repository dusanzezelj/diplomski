<?php

require_once 'sesijaZaposleni.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Vest.class.php';
$title = "Ažuriranje vesti";
$naslov ="Ažuriranje vesti";
require_once '../header.php';
require_once 'meni.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $vest = new Vest($db);
    $v = $vest->getVestByID($_GET['id']);
?>
<div id="div-azuriranje-vesti">
    <h3><?php echo $v['naslov']?></h3>
    <form class="pure-form pure-form-stacked" id="forma-azuriranje-vesti" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $v['ID']?>">
        <label>Sadržaj vesti:</label><textarea class="ckeditor" name="sadrzaj" value=""><?php echo $v['sadrzaj']?></textarea>
        <input type="submit" class="button-small pure-button" id="submit" name="submit" value="Prihvati">
    </form>
</div>
<?php require_once '../footer.php';?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../ckeditor/ckeditor.js"></script>
<script src="../js/ajx.js"></script>
