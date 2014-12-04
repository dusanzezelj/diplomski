<?php

$title = "Obaveštenja";
$naslov = "Obaveštenja";
require_once '../../../Class/Vest.class.php';
require_once 'includes.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$obavestenje = new Vest($db);
$id = $db->EscapeString($_GET['id']);
require_once 'meniPredmet.php';
$predmet = new Predmet($db);
$odsek = $predmet->getOdsek($id);
$path = $obavestenje->getPath($odsek, $id);
$obavestenja = $obavestenje->getVestByIDPredmet($id); ?>
<?php require_once 'meniPredmet.php';?>
<div id="lista-obavestenja">
    <?php if(!empty($obavestenja)): ?>
      <table class="pure-table pure-table-horizontal">
        <?php foreach ($obavestenja as $o): ?>
          <thead>
        <tr>
            <td><?php echo $o['naslov'];?></td>
            <td><?php echo $o['datum'];?></td>
        </tr>
          </thead>
          <tbody>
        <tr>
            <td colspan="2"><?php echo $o['sadrzaj'];?></td>
        </tr>
        <?php $materijali = $obavestenje->getMaterijali($o['ID']); 
         if(!empty($materijali)):?>
        <tr>
            <td>Materijali:</td>
            <td>              
                        <?php foreach ($materijali as $m): ?>
                <a href="<?php echo $path . $m['naziv'];?>"><?php echo $m['naziv']. '<br>';?></a>
                        <?php endforeach; ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
          </tbody>
      </table>
    <?php else: ?>
    <h3>Nema obaveštenja za ovaj predmet</h3>
    <?php endif; ?>
</div>

