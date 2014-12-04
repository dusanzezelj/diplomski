<?php

require_once '../../Class/Db.class.php';
require_once '../../Class/Publikacija.class.php';
require_once '../../inc/mysql.inc.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$redosled = $db->EscapeString($_GET['redosled']);
$publikacija = new Publikacija($db);
$sve_publikacije = $publikacija->svePublikacije($redosled);?>
<table class="pure-table pure-table-horizontal">
<?php foreach ($sve_publikacije as $pub): ?>
    <thead>
        <tr>
            <th>Naslov</th>
            <th><?php echo $pub['naslov']?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Autori</td>
            <td>
                <?php $autori = $publikacija->getAutor($pub[0]);
                echo $autori;?>
            </td>
        </tr>
        <tr>
        <td>Kategorija</td>
            <td><?php echo $pub['naziv']?></td>
        </tr>
        <tr>
            <td>Časopis</td>
            <td><?php echo $pub['casopis']?></td>
        </tr>
        <?php if($pub['apstrakt']): ?>
        <tr>
            <td>Apstrakt</td>
            <td>
                <a href="<?php echo $publikacija->getPath() . $pub['apstrakt'];?>">dokument sa apstraktom</a>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
<?php endforeach; ?>
</table>

