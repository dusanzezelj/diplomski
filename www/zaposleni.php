<?php
$title = "Zaposleni";
$naslov = "Zaposleni";
require_once 'header.php';
?>
<div id="lista-zaposleni">
    <table>
        <tr><th>Slika</th><th>Ime i prezime</th><th>Zvanje</th><th>Kontakt</th><th>Kabinet</th><th>Konsultacije</th><th>Predmeti</th></tr>
        <?php require_once 'load/loadZaposleni.php';?> 
    </table>
</div>
<?php require_once 'footer.php';?> 
