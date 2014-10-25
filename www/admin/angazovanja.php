<?php

$title = "Dodela angažovanja";
$naslov = "Dodela angažovanja";
require_once '../header.php';
require_once '../../Class/Db.class.php';
require_once '../../inc/mysql.inc.php';
require_once '../../Class/Zaposlen.class.php';
require_once '../../Class/Predmet.class.php';
 $db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
 $zaposlen = new Zaposlen($db);
 $predmet = new Predmet($db);
 $zaposleni = $zaposlen->sviZaposleni();
 $predmeti = $predmet->sviPredmeti();
?>
<div id="admin-grupe">
    <form id="forma-broj-grupa">
        <labela>Broj grupa:</labela>
        <input type="text" name="broj" size="2">
        <input type="submit" name="submit" value="Dodaj">
    </form>
</div>
<div id="admin-angazovanja">
    <form id="forma-angazovanje">
    <table>      
        <tr><th>Nastavni kadar</th><th>Predmeti</th></tr>
        <tr>
            <td>
                <select name="zaposlen">
                    <?php foreach ($zaposleni as $zap):?>
                    <option value="<?php echo $zap['ID'];?>">
                        <?php echo $zap['ime']. ' '. $zap['prezime'];?>
                    </option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
            <select name="predmet">
                    <?php foreach ($predmeti as $pred):?>
                    <option value="<?php echo $pred['ID'];?>">
                        <?php echo $zap['naziv'];?>
                    </option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Grupa:<input type="text" name="broj" size="2"></td>
            <td><input type="submit" value="Prihvati"></td>
        </tr>
    </table>
    </form>
</div>
<?php require_once '../header.php'; ?>