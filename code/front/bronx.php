<?php

include("./../back/LangController.php");

if (isset($_GET['lang'])) $lang = $_GET['lang'];
else $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($lang){
    case 'en' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\bronx\bronxEn.ini' ; break;}
    case 'ru' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\bronx\bronxRu.ini' ; break;}
    default : $path = "";
}
if (!file_exists($path)) $path = "";

$lang_controller = new LangController($path);
?>
<!DOCTYPE HTML>
<html lang=<? echo $lang ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>State Island</title>
    <link rel="stylesheet" href="css/bronx.css">
</head>
<body>
<div class="container">
    <header class="head">
        <nav class="links">
            <a href="https://www.google.com/maps/@40.7100571,-74.0087989,3a,75y,77.69h,104.75t/data=!3m8!1e1!3m6!1sAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK!2e10!3e11!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK%3Dw203-h100-k-no-pi-3.3762057-ya67.87782-ro-0-fo100!7i8000!8i4000">
                <? echo $dss = $lang_controller->load_text('head', 'map') ?>
            </a>
            <a href=<? echo "index.php?lang=" . $lang ?>>  <? echo $dss = $lang_controller->auto_load_text('head') ?></a>
        </nav>
    </header>
    <div class="main">
        <aside>
            <nav class="areas">
                <a href=<?echo "bronx.php?lang=".$lang?>>•<? echo $dss = $lang_controller->load_text('areas','2') ?><br><br></a>
                <a href=<? echo "stateIsland.php?lang=" . $lang ?>>•‎<? echo $dss = $lang_controller->load_text('areas','5') ?>
                    <br><br></a>
            </nav>
        </aside>
        <section class="holst">
            <section class="centerPhotos">
                <div class="holstText">
                    <img src="design/bronx/Subway.jpg" alt="Error">
                    <p> <? echo $dss = $lang_controller->auto_load_text('holstText') ?> <br></b><br>
                        <a href="https://www.google.com/maps/place/%D0%91%D1%80%D0%BE%D0%BD%D0%BA%D1%81,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%A1%D0%A8%D0%90/@40.8528558,-73.9064485,12.5z/data=!4m5!3m4!1s0x89c28b553a697cb1:0x556e43a78ff15c77!8m2!3d40.8447819!4d-73.8648268">
                            ‎<? echo $dss = $lang_controller->auto_load_text('Location') ?>
                        </a>
                    </p>
                </div>
            </section class="photos">
            <section class="rightPhotos">
                <img src="design/bronx/6.jpg" alt="Error">
                <img src="design/bronx/3.jpg" alt="Error">
                <img src="design/bronx/7.png" alt="Error">
                <p> ‎<? echo $dss = $lang_controller->auto_load_text('rightPhotos') ?> </p>
            </section>
            <section class="leftPhotos">
                <img src="design/bronx/5.jpg" alt="Error">
                <img src="design/bronx/4.jpg" alt="Error">
                <img src="design/bronx/2.jpg" alt="Error" ">
            </section>
        </section>
    </div>
</div>
<footer class="footer">
    <p> <? echo $dss = $lang_controller->load_text('footer', 'author') ?>
        <a href="bronx.php?lang=en"><img src="design/englishFlagIcon.png" alt="Cant no find file"></a>
        <a href="bronx.php?lang=ru"><img src="design/russianFlagIcon.png" alt="Cant no find file"></a>
    </p>
</footer>
</body>
</html>
