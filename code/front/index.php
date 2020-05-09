<?php

include("./../back/LangController.php");

if (isset($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

switch ($lang){
    case 'en' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\home\indexEn.ini' ; break;}
    case 'ru' : { $path = 'D:\Labs\Semester4\WT\Laba8\ini-files\home\indexRu.ini' ; break;}
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
	 <title>New York City</title>
	 <link rel="stylesheet" href="./css/index.css">
 <body>
 	<section class="container">
 		<header class="head">
 			<nav class="links">
  			<a href="https://www.google.com/maps/@40.7100571,-74.0087989,3a,75y,77.69h,104.75t/data=!3m8!1e1!3m6!1sAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK!2e10!3e11!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipNy7dsbld4ttJCQ0cCvFSY3j5-xQTb-E2rrlFCK%3Dw203-h100-k-no-pi-3.3762057-ya67.87782-ro-0-fo100!7i8000!8i4000">
                <?echo $dss =$lang_controller->auto_load_text('head')?>
            </a>
                <a href=<?echo "stateIsland.php?lang=".$lang?>>  <?echo $dss =$lang_controller->auto_load_text('head')?></a>
			</nav>
    	</header>
    <section class="main">
    		<section>
    			<figure>
					   <img src="design/home/New_York_art.jpg" alt = "Error"  >
					   <figcaption><?echo $dss =$lang_controller->auto_load_text('main')?></figcaption>
			   	</figure>	
		    </section>
			<section class="video">
				<video src="design/home/Welcome%20to%20New%20York.mp4" alt="Error" controls="controls" class = "videoPlayer" poster="design/home/fon.png" ></video>
			</section>
		</section>
		<footer class="footer">
            <p> <?echo $dss =$lang_controller->load_text('footer','author')?>
                <a href="index.php?lang=en"><img src="design/englishFlagIcon.png" alt="Can not find image"></a>
                <a href="index.php?lang=ru"> <img src="design/russianFlagIcon.png" alt="Can not find image"></a>
            </p>
		</footer>
  </section>
 </body>








