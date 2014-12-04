<?php
$title = "Početna";
$naslov = "Katedra za računarsku tehniku i informatiku";
require_once 'www/header.php';
 ?>
<div id="slike-pocetna">
    <ul class="rslides">
        <li><img src="upload/images/slike_pocetna/etf1.jpg"></li>
        <li><img src="upload/images/slike_pocetna/etf2.jpg"></li>
        <li><img src="upload/images/slike_pocetna/etf3.jpg"></li>
        <li><img src="upload/images/slike_pocetna/etf4.jpg"></li>
        <li><img src="upload/images/slike_pocetna/etf5.jpg"></li>
    </ul>
</div>
<div id="forme-za-prijavu">
    <h4>Studenti</h4>
    <form class="prijava">
        <input type="hidden" name="tip" value="student">
        <label>Korisničko ime:</label><input type="text" id="username" name="username" size="12" required>
        <label>Lozinka:</label><input type="password"  id="password" name="password" size="12" required>
        <input type="submit" class="pure-button button-small" name="submit" id="submit" value="Prijavi se">    
</form>
    <h4>Zaposleni</h4>
    <form class="prijava">
         <input type="hidden" name="tip" value="zaposlen">
        <input type="radio" name="vrsta" value="admin">Administrator
        <input type="radio" name="vrsta" value="nastavnik" checked="checked">Nastavnik
        <label>Korisničko ime:</label><input type="text" id="username" name="username" size="12" required>
        <label>Lozinka:</label><input type="password"  id="password" name="password" size="12" required>
    <input type="submit" class="pure-button button-small" name="submit" id="submit" value="Prijavi se">    
</form>
</div>
<div id="katedra-tekst">
    <p>Misija elektrotehničkog fakulteta je da studentima obezbedi vrhunsko obrazovanje u oblasti elektrotehnike i računarstva,
        podstičući njihovu kreativnost, odgovornost, istraživački duh i timski rad.
        Da kompanijama obezbedi izuzetne inženjere, koji će biti u stanju da unaprede njihovu produktivnost, inovativnost i konkurentnost na tržištu, pre svega u Srbiji,
        ali i bilo gde u svetu. Da svojim naučno-istraživačkim radom permanentno doprinosimo tehnološkom napretku, informatizaciji i sveukupnom stepenu razvoja naše zemlje.</p>
    <p>Katedra za računarsku tehniku i informatiku se bavi edukacijom, naučno-istraživačkim i projektantskim radom u oblasti računarskog hardvera, softvera i računarskih mreža.</p>
</div>
<div class="pocetna-sadrzaj">
    <div class="podnaslov"><h2>Vesti</h2></div>
    <div class="item">
        <h5>IEEE SEMINAR: How Should Engineers Express Their Ideas</h5>
    </div>
    <div class="item">
        <h5>Konkurs za dodelu nagrade Fondacije PROFESORA MIRKA MILIĆA na Dan Elektrotehničkog fakulteta</h5>        
    </div>
    <div class="item">
        <h5>Dobitnici nagrada na LabVIEW takmičenju 2014</h5>
    </div>
    <div class="item">
        <h5>Konačne budžetske rang liste za upis na doktorske akademske studije generacije 2012 i 2013</h5>
    </div>
     <div class="item">
        <h5>Sazivanje konstitutivne sednice Studentskog parlamenta za školsku 2014/2015 godinu</h5>
    </div>
</div>
<div class="pocetna-sadrzaj">
    <div class="podnaslov"><h2>Konkursi</h2></div>
    <div class="item">
        <h5>Alteatec IT Services: Linux administrator</h5>
    </div>
    <div class="item">
        <h5>Iritel: Inženjer za razvoj i testiranje softvera i hardvera</h5>        
    </div>
    <div class="item">
        <h5>Konkurs za nove članove formula student tima "Drumska Strela"</h5>
    </div>
    <div class="item">
        <h5>Konkurs za program stipendija nemačke privrede dr Zoran Đinđić 2015 - XII generacija</h5>
    </div>
     <div class="item">
        <h5>MHT Balkan d.o.o. traži programer</h5>
    </div>
</div>
     

 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
 <script src="www/js/responsiveslides.min.js"></script>
  <script src="www/js/ajx.js"></script>
 <script>     
    $(function() {
    $(".rslides").responsiveSlides({
         maxwidth: 750,
         speed: 600,
         
    });
  });
</script>
<?php require_once 'www/footer.php'; ?>

