<?php

include("./../back/LangController.php");

if (isset($_GET['lang'])) $lang = $_GET['lang'];
else $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($lang){
    case 'en' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\stateIsland\stateIslandEn.ini' ; break;}
    case 'ru' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\stateIsland\stateIslandRu.ini' ; break;}
    default : $path = "";
}
if (!file_exists($path)) $path = "";

$lang_controller = new LangController($path);
?>
<!DOCTYPE HTML>
<html lang=<?echo $lang?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>State Island</title>
    <link rel="stylesheet" href="./css/stateIsland.css">
</head>
<body>
<div class="container">
    <header class="head">
        <nav class="links">
            <a href="https://www.google.com/maps/@40.7100571,-74.0087989,3a,75y,77.69h,104.75t/data=!3m8!1e1!3m6!1sAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK!2e10!3e11!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK%3Dw203-h100-k-no-pi-3.3762057-ya67.87782-ro-0-fo100!7i8000!8i4000">
                <?echo $dss =$lang_controller->load_text('head','map')?>
            </a>
            <a href=<?echo "index.php?lang=".$lang?>>  <?echo $dss =$lang_controller->auto_load_text('head')?></a>
        </nav>
    </header>
    <div class="main">
        <aside>
            <nav class="areas">
                <a href=<?echo "bronx.php?lang=".$lang?>>•<?echo $dss =$lang_controller->load_text('areas','2')?><br><br></a>
                <a href=<?echo "stateIsland.php?lang=".$lang?>>•‎<?echo $dss = $lang_controller->load_text('areas','5') ?><br><br></a>
            </nav>
        </aside>
        <section class="holst">
            <section class="centerPhotos">
                <div class="holstText">
                    <p> ‎<?echo $dss =$lang_controller->auto_load_text('holstText')?></p>
                </div>

            </section>
            <section class="rightPhotos">
                <img src="design/stateIsland/4.jpg" alt="Error" >
                <img src="design/stateIsland/5.jpg" alt="Error" >
                <img src="design/stateIsland/6.jpg" alt="Error" >
                <img src="design/stateIsland/7.jpg" alt="Error" >
                <div class="Location">
                    <a href="https://www.google.com/maps/place/%D0%A1%D1%82%D0%B0%D1%82%D0%B5%D0%BD-%D0%90%D0%B9%D0%BB%D0%B5%D0%BD%D0%B4,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%A1%D0%A8%D0%90/@40.5645845,-74.2168581,12z/data=!3m1!4b1!4m13!1m7!3m6!1s0x89c28b553a697cb1:0x556e43a78ff15c77!2z0JHRgNC-0L3QutGBLCDQndGM0Y4t0JnQvtGA0LosINCh0KjQkA!3b1!8m2!3d40.8447819!4d-73.8648268!3m4!1s0x89c245ef79f4d4e7:0x50271f8534babc78!8m2!3d40.5795417!4d-74.1501617">
                        ‎<?echo $dss =$lang_controller->auto_load_text('Location')?>
                    </a>
                </div>
            </section>
            <section class="leftPhotos">
                <img src="design/stateIsland/1.jpg" alt="Error" >
                <img src="design/stateIsland/2.jpg" alt="Error" >
                <img src="design/stateIsland/3.jpg" alt="Error" >
                <img src="design/stateIsland/8.jpg" alt="Error">

            </section>
        </section>
        <footer class="footer">
            <p> <?echo $dss =$lang_controller->load_text('footer','author')?>
                <a href="stateIsland.php?lang=en"><img src="design/englishFlagIcon.png" alt="Cant no find file"></a>
                <a href="stateIsland.php?lang=ru"><img src="design/russianFlagIcon.png" alt="Cant no find file"></a>
            </p>
        </footer>
</body>
</html>
