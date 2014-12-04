<?php
$title = "Zaposleni";
$naslov = "Zaposleni";
require_once 'header.php';
?>
<div id="lista-zaposleni">
    <table class="pure-table pure-table-horizontal">
        <thead>
        <tr>
            <th>Slika</th><th>Ime i prezime</th><th>Zvanje</th><th>Kontakt</th><th>Kabinet</th><th>Konsultacije</th><th>Predmeti</th>
        </tr>
        </thead>
        <tbody>
        <?php require_once 'load/loadZaposleni.php';?> 
        </tbody>
    </table>
</div>
<?php require_once 'footer.php';?> 
