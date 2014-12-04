<?php

$title = "Nastavnik";
$naslov = "Nastavnik";
require_once '../header.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';

$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$id = $db->EscapeString($_GET['id']);
$zaposlen = new Zaposlen($db);
$zap = $zaposlen->getZaposlen($id);
if (!empty($zap)):
    ?>
    <?php if (!empty($zap['slika'])): ?>
        <div id="slika-nastavnik">
            <img src="<?php echo $zaposlen->putanjaSlike() . $zap['slika']; ?>">
        </div>
             <?php endif; ?>
        <div id="nastavnik-info">
        <table class="pure-table pure-table-horizontal">
            <tbody>
            <tr>
                <td class="kolona1">Ime i prezime:</td>
                <td><?php echo $zap['ime'] . ' ' . $zap['prezime'] ?></td>
            </tr>
            <tr>
                <td>Telefon:</td>
                <td><?php echo $zap['telefon'] ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $zap['email'] ?></td>
            </tr>
            <tr>
                <td>Web sajt:</td>
                <td><?php echo $zap['web_sajt'] ?></td>
            </tr>
            <tr>
                <td>Biografija:</td>
                <td><?php echo $zap['biografija'] ?></td>
            </tr>
            <tr>
                <td>Kabinet:</td>
                <td><?php echo $zap['kabinet'] ?></td>
            </tr>
            <tr>
                <td>Prijem studenata:</td>
                <td><?php echo $zap['prijem_studenata'] ?></td>
            </tr> 
            </tbody>
        </table>
    </div>
<?php endif; ?>

