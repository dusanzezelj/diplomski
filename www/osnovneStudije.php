<?php

$title = "Osnovne studije";
$naslov = "Osnovne studije";
require_once 'header.php';
require_once 'getPredmet.php';
if($_GET['odsek'] == "rti"): ?>
<div id="podnaslov-ostudije">
    <h3>Odsek za Racunarsku tehniku i informatiku</h3>
<?php elseif ($_GET['odsek'] == "si") : ?>
    <h3>Odsek Softversko inzenjerstovo</h3>
<?php elseif ($_GET['odsek'] == "ostali") : ?>
    <h3>Ostali odseci</h3>
<?php endif; ?>
</div>
<?php if(!isset($_GET['predmetID'])): ?>

<?php endif; ?>


