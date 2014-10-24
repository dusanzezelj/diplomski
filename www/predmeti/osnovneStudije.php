<?php

$title = "Osnovne studije";
$naslov = "Osnovne studije";
require_once '../header.php';
require_once '../../Class/Predmet.class.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$predmet = new Predmet($db);
$odsek = $db->EscapeString($_GET['odsek']);
$predmeti = $predmet->getPredmetByOdsek($odsek);
if($_GET['odsek'] == "rti") : ?>
    
<div id="podnaslov-ostudije">
    <h1>Odsek za Racunarsku tehniku i informatiku</h1>
<?php elseif ($_GET['odsek'] == "si") : ?>
    
    <h1>Odsek Softversko inzenjerstovo</h1>
<?php elseif ($_GET['odsek'] == "ostali") : ?>
    
    <h1>Ostali odseci</h1>
<?php endif; ?>
    
</div>
<div id="lista-predmeta">
    <?php if(!empty($predmeti)) : 
        $semestar = 0; ?>
        <table>
            <tr><th>Predmet</th><th>Profesor</th><th>ESPB</th></tr>
            <?php foreach ($predmeti as $p):
                $profesor = $predmet->getProfesor($p['ID']);
                if ($p['semestar']!= $semestar):
                    $semestar = $p['semestar']; ?>
            <tr collspan="3"><td>Semestar <?php echo $semestar; ?></td></tr>
                <?php endif; ?>
            <tr><td><?php echo $p['naziv']?></td><td><?php echo $profesor ?></td><td><?php echo $p['espb']?></td></tr>
            <?php endforeach;?>
        </table>
    <?php endif; ?>
</div>
<?php require_once '../footer.php'; ?>




