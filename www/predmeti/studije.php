<?php

$title = "Studije";
$naslov = "Studije";
require_once '../header.php';
require_once '../../Class/Predmet.class.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$odsek = $db->EscapeString($_GET['odsek']);
$predmeti = $predmet->getPredmetByOdsek($odsek); ?>
<div id="podnaslov-ostudije">
<?php switch ($odsek) {
    case "rti": ?>
        <h2>Odsek za Računarsku tehniku i informatiku</h2>
  <?php break; ?>
  <?php case "si": ?>
        <h2>Odsek Softversko inženjerstvo</h2>
   <?php break; ?>
    <?php case "ostali": ?>
        <h2>Ostali odseci</h2>
   <?php break; ?>
   <?php case "master": ?> 
        <h2>Master studije</h2>
   <?php break; ?> 
   <?php case "doktorske": ?> 
        <h2>Doktorske studije</h2>
   <?php break; ?>
    <?php default: ?> 
        <h1>Nema odseka</h1>
   <?php break;
    } ?> 
</div>    
<div id="lista-predmeta">
    <?php if(!empty($predmeti)) : 
        $semestar = 0; ?>
        <table class="pure-table pure-table-bordered">
            <thead>
            <tr><th>Predmet</th><th>Profesor</th><th>ESPB</th></tr>
            </thead>
            <tbody>
            <?php foreach ($predmeti as $p):
                $profesori = $predmet->getProfesor($p['ID']);
                if ($p['semestar']!= $semestar):
                    $semestar = $p['semestar']; ?>
                <tr style="background-color:#AD4B56;"><td>Semestar <?php echo $semestar; ?></td><td></td><td></td></tr>
                <?php endif; ?>
            <tr>
                <td><a href="predmet/predmet.php?id=<?php echo $p['ID']?>"><?php echo $p['naziv']?></a></td>
                <td><?php foreach ($profesori as $prof):?>
                    <a href="predmet/nastavnik.php?id=<?php echo $prof['ID']?>"><?php echo $prof['ime'].' '.$prof['prezime'].'<br>'?></a>
                <?php endforeach; ?></td>
                <td><?php echo $p['espb']?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php require_once '../footer.php'; ?>




