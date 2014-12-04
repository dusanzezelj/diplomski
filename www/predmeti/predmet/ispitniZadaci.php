<?php

$title = "Ispitni zadaci";
$naslov = "Ispitni zadaci";
require_once 'includes.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$id = $db->EscapeString($_GET['id']);
require_once 'meniPredmet.php';
$ispitni_zadaci = $predmet->getIspitniZadaci($id);
?>
<div id="lista-materijali">
    <?php if(!empty($ispitni_zadaci)): ?>
      <table class="pure-table pure-table-horizontal">
          <thead>
        <tr>
            <th style="width: 200px;">Naziv</th><th>Tip</th><th>Veličina</th><th>Datum</th><th></th>
        </tr>
          </thead>
          <tbody>
        <?php foreach ($ispitni_zadaci as $ispit): ?>             
        <tr>
            <td><?php echo $ispit['naziv'];?></td>
            <td><?php echo $ispit['tip'];?></td>
            <td><?php echo $ispit['velicina'];?></td>
            <td><?php echo $ispit['datum'];?></td>
            <td><a href="<?php echo $predmet->getPath($id, "ispitni_zadaci"). $ispit['naziv'];?>">Preuzmi</a></td>
        </tr>    
        <?php endforeach; ?>
          </tbody>
      </table>
    <?php else: ?>
    <h3>Nema ispitnih zadataka za ovaj predmet</h3>
    <?php endif; ?>
</div>
<?php require_once '../../footer.php';?>
