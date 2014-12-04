<?php
require_once 'sesijaAdmin.php';
$title = "Slike zaposlenih";
$naslov = "Unos slika zaposlenih";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once 'resizeImage.function.php';
require_once 'adminMeni.php';
$db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
$zaposlen = new Zaposlen($db);
if (isset($_POST['submit'])) {
    if (!empty($_FILES['slika']) && $_FILES['slika']['error'] == 0) {
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . "diplomski/upload/images/" . basename($_FILES['slika']['name']);
        $dodato = resizeImage($_FILES['slika']['tmp_name'], null, 64, 64, true, $upload_path);
        if($dodato){
            $zaposlen->addImage($_POST['zaposlen'], basename($_FILES['slika']['name']));
            echo "Slika je uspešno dodata";
        } else {
            echo "Greška prilikom dodavanja slike";
        }
    } else {
        echo "Niste odabrali sliku";
    }
}
$zaposleni = $zaposlen->sviZaposleni();
?>
<div class="forma1" id="admin-dodela-slika">
    <form class="pure-form pure-form-stacked" action="" method="POST" enctype="multipart/form-data">
        <label>Odaberite zaposlenog:</label>
        <select name="zaposlen">
            <?php foreach ($zaposleni as $zap): ?>
                <option value="<?php echo $zap['ID']; ?>">
                    <?php echo $zap['ime'] . ' ' . $zap['prezime']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Slika:</label><input type="file" name="slika">
        <input class="pure-button button-small" type="submit" name="submit" value="Prihvati">
    </form>
</div>
<?php require_once '../footer.php'; ?>