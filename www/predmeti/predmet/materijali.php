<?php

$title = "Materijali";
$naslov = "Materijali";
require_once 'includes.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString($_GET['id']);
$materijali = $predmet->getMaterijal($id);
?>
<div id="lista-materijali">
    <?php if(!empty($materijali)): ?>
      <table>
        <tr>
            <th>Naziv</th><th>Tip</th><th>Veličina</th><th>Datum</th>
        </tr>
        <?php foreach ($materijali as $m): ?>             
        <tr>
            <td><?php echo $m['naziv'];?></td>
            <td><?php echo $m['tip'];?></td>
            <td><?php echo $m['velicina'];?></td>
            <td><?php echo $m['datum'];?></td>
            <td><a href="<?php echo $predmet->getPath($id, "materijali"). $m['naziv'];?>">Preuzmi</a></td>
        </tr>    
        <?php endforeach; ?>
      </table>
    <?php else: ?>
    <h3>Nema materijala za ovaj predmet</h3>
    <?php endif; ?>
</div>
<?php require_once '../../footer.php';?>