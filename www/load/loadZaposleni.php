<?php

require_once '../Class/Db.class.php';
require_once '../Class/Zaposlen.class.php';
require_once '../Class/Predmet.class.php';
require_once '../inc/mysql.inc.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$zaposleni = new Zaposlen($db);
$predmeti = new Predmet($db);
$svi_zaposleni = $zaposleni->sviZaposleni();
?>
<?php foreach ($svi_zaposleni as $zap): ?>
   <tr>
     <td>
      <?php if(!empty($zap['slika'])): ?>
       <img src="../images/zaposleni/<?php echo $zap['slika'] ;?>">
      <?php endif; ?>   
    </td>
    <td><?php echo $zap['ime'].' '.$zap['prezime']?></td>
    <td><?php echo $zap['zvanje']?></td>
    <td><?php echo $zap['email']?></td>
    <td><?php echo $zap['kabinet']?></td>
    <td><?php echo $zap['prijem_studenata']?></td>
    <td>
    <?php if($zap['zvanje'] == "redovni profesor" || $zap['zvanje'] == "vanredni profesor"): ?>
        <?php $pred = $predmeti->getPredmetByProf($zap['ID']);
        foreach ($pred as $p) {
            echo $p['naziv'].'<br>';
         } ?>
       <?php endif; ?>                   
   </td>   
 </tr>
<?php endforeach; ?>