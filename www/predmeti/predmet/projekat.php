<?php

$title = "Projekti/Domaći zadaci";
$naslov = "Projekti/Domaći zadaci";
require_once 'includes.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString($_GET['id']);
require_once 'meniPredmet.php';
$projekti = $predmet->getProjekti($id);
?>
<div id="lista-materijali">
    <?php if(!empty($projekti)): ?>
    <table class="pure-table pure-table-horizontal">
        <thead>
        <tr>
            <th style="width: 200px;">Naziv</th><th>Tip</th><th>Veličina</th><th>Datum</th><th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projekti as $projekat): ?>             
        <tr>
            <td><?php echo $projekat['naziv'];?></td>
            <td><?php echo $projekat['tip'];?></td>
            <td><?php echo $projekat['velicina'];?></td>
            <td><?php echo $projekat['datum'];?></td>
            <td><a href="<?php echo $predmet->getPath($id, "projekti"). $projekat['naziv'];?>">Preuzmi</a></td>
        </tr>    
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
    <h3>Nema projekata i domaćih zadataka za ovaj predmet</h3>
    <?php endif; ?>
</div>
<?php require_once '../../footer.php';?>
