<?php

require_once '../../../Class/Db.class.php';
require_once '../../../inc/mysql.inc.php';
require_once '../../../Class/Laboratorija.class.php';
session_start();
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$laboratorija = new Laboratorija($db);
$materijali = $laboratorija->getLabMaterijali($_SESSION['predmetID']);
echo '  <table class="pure-table pure-table-horizontal">
            <caption>Materijali za laboratorijske vežbe</caption>
            <thead>
             <tr>
             <th>Naziv vežbe</th><th>Materijal</th><th>Tip</th><th>Veličina</th><th>Datum postavljanja</th><th>Autor</th>
             </tr>
             </thead>
             <tbody>';
    foreach ($materijali as $m) {
        echo '<tr>
            <td>' . $v['naziv'] . '</td>
            <td>' . $v['fajl'] . '</td>
            <td>' . $v['tip'] . '</td>
            <td>' . $v['velicina'] . '</td>
            <td>' . $v['datum'] . '</td>
            <td>' . $v['autor'] . '</td>
            <td class="obrisi"><a href="#">Obriši</a></td>
            </tr>
            </tbody>';
}
echo '</table>';
?>
