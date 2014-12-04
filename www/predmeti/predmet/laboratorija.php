<?php

$title = "Ispitni zadaci";
$naslov = "Ispitni zadaci";
require_once 'includes.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$laboratorija = new Laboratorija($db);
$id = $db->EscapeString($_GET['id']);
require_once 'meniPredmet.php';
$lab_vezbe = $laboratorija->getLabMaterijali($id);
?>
<div id="info-lab-vezbe">
    <?php if(!isset($lab_vezbe['broj'])):?>
    <h3>Nema informacija o broju laboratorijskih vežbi</h3>
    <?php else:?>
    <b>Broj laboratorijskih vežbi:</b><?php echo $lab_vezbe['broj']?>
    <?php endif;?>
    <?php if(!isset($lab_vezbe['nacin_rada'])):?>
    <h3>Nema informacija o načinu rada laboratorijskih vežbi</h3>
    <?php else:?>
    <b>Praktičan rad:</b>
    <p><?php echo $lab_vezbe['nacin_rada']?></p>
    <?php endif;?>
</div>
<div id="lista-materijali">
    <h3>Laboratorijske vežbe i prateći materijali</h3>
    <?php if(!empty($lab_vezbe)): ?>
      <table>
        <tr>
            <th>Naziv vežbe</th><th>Naziv materijala</th><th>Tip</th><th>Veličina</th><th>Datum</th>
        </tr>
        <?php foreach ($lab_vezbe as $vezba): ?>             
        <tr>
            <td><?php echo $ispit['naziv'];?></td>
            <td><?php echo $ispit['fajl'];?></td>
            <td><?php echo $ispit['tip'];?></td>
            <td><?php echo $ispit['velicina'];?></td>
            <td><?php echo $ispit['datum'];?></td>
            <td><a href="<?php echo $predmet->getPath($id, "ispitni_zadaci"). $ispit['naziv'];?>">Preuzmi</a></td>
        </tr>    
        <?php endforeach; ?>
      </table>
    <?php else: ?>
    <h3>Nema materijala za laboratorijske vežbe iz ovog predmeta</h3>
    <?php endif; ?>
</div>
<?php require_once '../../footer.php';?>

