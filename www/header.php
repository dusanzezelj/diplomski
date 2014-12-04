<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/diplomski/www/styles/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title ?></title>

    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="slika-logo"><a href="http://localhost/diplomski/index.php">
                        <img src="http://localhost/diplomski/upload/images/slike_pocetna/logo-etf.jpg">
                    </a>
                </div>
                <div id="header-naslov">
                    <h1><?php echo $naslov ?></h1>
                </div>
                <div id="header-lozinka">
                    <a href="http://localhost/diplomski/www/promenaLozinke.php">Promena lozinke<br></a>
                    <a href="http://localhost/diplomski/www/odjava.php">Odjava</a>
                </div>
            </div>           
            <?php require_once 'glavniMeni.php'; ?>
            <div id="baner">
                <h3>Prostor za<br>
                    baner</h3>
            </div>