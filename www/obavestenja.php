<?php
if(isset($_GET['sva'])){
    $title = "Arhiva Obaveštenja";
    $naslov = "Arhiva Obaveštenja";
} else {
    $title = "Obaveštenja";
    $naslov = "Obaveštenja";
}
require_once 'header.php';
require_once '../Class/Db.class.php';
require_once '../inc/mysql.inc.php';
require_once '../Class/Obavestenje.class.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$obavestenje = new Obavestenje($db);
if(isset($_GET['sva'])){
    $obavestenja = $obavestenje->getSvaObavestenja();
} else {
    $obavestenja = $obavestenje->getNovaObavestenja();
}
?>
 <?php if(!empty($obavestenja)): ?>
<div id="lista-obavestenja">
        <table class="pure-table pure-table-horizontal">
            <?php foreach ($obavestenja as $o): ?>     
                <thead>
                    <tr>
                        <td><?php echo $o['naslov']; ?></td>
                        <td><?php echo $o['datum']; ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><?php echo $o['sadrzaj']; ?></td>
                    </tr>   
                <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
<div class="prazno">
        <h1>Nema obaveštenja</h1>
</div>
    <?php endif; ?>
<?php if (!isset($_GET['sva'])): ?>
    <div id="link-arhiva">
        <a href="obavestenja.php?sva=1">Arhiva obaveštenja</a>
    </div>
<?php endif;?>
<?php require_once 'footer.php'; ?>