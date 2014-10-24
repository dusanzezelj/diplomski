<?php

$title = "Obaveštenja";
$naslov = "Obaveštenja";
require_once '../../header.php';
require_once '../../../Class/Vest.class.php';
require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$obavestenje = new Vest($db);
$id = $db->EscapeString($_GET['id']);
$obavestenja = $obavestenje->getVestByIDPredmet($id); ?>
<?php require_once 'meniPredmet.php';?>
<div id="lista-obavestenja">
    <?php if(!empty($obavestenja)): ?>
      <table>
        <?php foreach ($obavestenja as $o): ?>     
        <tr collspan="2">
            <td><?php echo $o['naslov'];?></td>
        </tr>
        <tr>
            <td><?php echo $o['sadrzaj'];?></td><td><?php echo $o['datum'];?></td>
        </tr>    
        <?php endforeach; ?>
      </table>
    <?php else: ?>
    <h3>Nema obaveštenja za ovaj predmet</h3>
    <?php endif; ?>
</div>

