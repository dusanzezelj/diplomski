<?php

require_once 'sesijaZaposleni.php';
if(!isset($_SESSION['predmetID'])){
    header('Location:predmeti.php');
}
$title = "Laboratorijske vežbe";
$naslov ="Laboratorijske vežbe";
require_once '../header.php';
require_once 'meni.php';
$predmet = $_SESSION['predmetID'];
?>
<div class="sadrzaj-nastavnik" id="unos-lab-vezbe">
    <h3>Unesite informacije o laboratorijskim vežbama</h3>
    <form class="pure-form pure-form-stacked" action="" method="POST">
        <label>Broj vežbi:</label><input type="text" name="broj" size="3">
        <label>Kako se rade vežbe:</label><textarea class="ckeditor" name="nacin"></textarea>
        <input class="pure-button pure-button-primary" type="submit" value="Prihvati">
    </form>
        </form>
</div>
<div class="sadrzaj-nastavnik" id="materijal-lab-vezbe">
    <h3>Dodavanje materijala za laboratorijske vežbe</h3>
    <form class="pure-form pure-form-aligned" action="" method="POST" enctype="multipart/form-data">
        <div class="pure-control-group"><label>Naziv vežbe:</label><input type="text" name="naziv"></div> 
        <div class="pure-control-group"><label>Materijal:</label><input type="file" name="file"></div>               
         <input type="hidden" name="predmet" value="<?php echo $predmet?>">
         <input class="pure-button button-small" type="submit" name="submit" value="Prihvati">
    </form>
</div>

<div id='spisak-lab-mat'>
    
</div>
 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../js/ajx.js"></script>
<?php require_once '../footer.php';?>