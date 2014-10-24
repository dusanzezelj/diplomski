<?php
require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../sesijaZaposleni.php';
require_once '../../../Class/Vest.class.php';
require_once '../../../Class/Predmet.class.php';


$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
    $vest = new Vest($db);
    $predmet = new Predmet($db);
    $angazovanje = $predmet->getPredmetByProf($_SESSION['id']);
    $id_predmet = array();
    foreach ($angazovanje as $red){
        $id_predmet[] = $red['ID'];
    }
    $id_predmet = implode(",", $id_predmet);
    $sve_vesti = $vest->getVestByIDPredmet($id_predmet);    
    echo '  <table>
            <caption>Sve vesti</caption>
             <tr>
             <th>ID vesti</th><th>Naslov</th><th>Id predmeta</th>
             </tr>';
    foreach ($sve_vesti as $v){
        echo '<tr>
              <td>'. $v['ID'].'</td><td>'. $v['naslov'].'</td><td>'. $v['id_predmet'].'</td><td><a href="azuriranjeVesti.php?id='.$v['ID'].'">azuriraj</a></td><td class="obrisi"><a href="#">Obriši</a></td>
             </tr>';
        }
        echo '</table>';   
  ?>
 