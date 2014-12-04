<?php

$title = "Publikacije";
$naslov = "Publikacije";
require_once 'header.php';
?>
<div id="sortiranje-publikacije" class="pure-form">
    <label>Sortiraj po</label><select name="redosled">
        <option value="naslov">Naslovu</option>
        <option value="kategorija">Kategoriji</option>
    </select>
</div>
<div id="lista-publikacije">
    
</div>
<?php require_once 'footer.php';?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/ajx.js"></script>

