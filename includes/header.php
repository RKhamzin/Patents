<?php
    $myPage = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>РИДы 08 Департамента</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-type" content="image/gif" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/menu.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="js/func.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter41180849 = new Ya.Metrika({
                    id:41180849,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/41180849" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">
$(document).ready(function() {
	
$("ul#topnav li").hover(function() { //Hover over event on list item
	$(this).css({ 'background' : '#1376c9 url(topnav_active.gif) repeat-x'}); //Add background color + image on hovered list item
	$(this).find("span").show(); //Show the subnav
} , function() { //on hover out...
	$(this).css({ 'background' : 'none'}); //Ditch the background
	$(this).find("span").hide(); //Hide the subnav
});
	
});
</script>
</head>
<body>
<div class="shell">
	<div id="header">
		<h1 id="logo"><a href="/"><span class="min"><span class="red">Разработчик</span> Хамзин Р.М.</span></a></h1>
<!--		<div id="navigation">
			<ul>
				<?php if ($myPage == "/"){?><li><a href="/" class="active">Home</a></li><?php } else { ?><li><a href="/">Home</a></li> <?php }?>
				<?php if ($myPage == "/patents.php"){?><li><a href="/patents.php" class="active">Патенты</a></li><?php } else { ?><li><a href="/patents.php">Патенты</a></li> <?php }?>
				<?php if ($myPage == "/nouhau.php"){?><li><a href="/nouhau.php" class="active">Ноу-Хау</a></li><?php } else { ?><li><a href="/nouhau.php">Ноу-Хау</a></li> <?php }?>
				<?php if ($myPage == "/duty.php"){?><li><a href="/duty.php" class="active">Пошлины</a></li>
				    <div id="subnavigation">
		                 <ul>
			                <li>&nbsp;<a href = "/grafpay.php" class="active">График платежей</li>
			             </ul>   
		            </div>        
				<?php } else { ?><li><a href="/duty.php">Пошлины</a></li> <?php }?>
				<?php if ($myPage == "/contact.php"){?><li class="last"><a href="/contact.php" class="active">Контакты</a></li><?php } else { ?><li class="last"><a href="/contact.php">Контакты</a></li> <?php }?>
			</ul>
			<div class="cl">&nbsp;</div>
		</div>      /-->

        <div class="container">
                <ul id="topnav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/patents.php">Патенты</a></li>
                    <li>
                        <a href="/nouhau.php">Ноу Хау</a>
<!--                        <span>
                            <a href="">Что мы делаем</a> |
                            <a href="">Наш процесс</a> |
                            <a href="">Тест</a>
                        </span>    /-->
                    </li>
                    <li>
                        <a href="/duty.php">Пошлины</a>
                        <span>
                            <a href="/grafpay.php">График платежей</a> |
                            <a href="">&nbsp;</a> |
                            <a href="">&nbsp;</a> |
                            <a href="">&nbsp;</a>
                        </span>
                    </li>
                    <li><a href="/contact.php">Контакты</a></li>
                </ul>
        </div>

	</div>

	<div class="slider-holder">
		<a href="#" class="prev notext">prev</a>
		<a href="#" class="next notext">next</a>
		<div class="slider">
			<ul>
			    <li><img src="images/slide01.jpg" alt="" /></li>
			    <li><img src="images/slide01.jpg" alt="" /></li>
			    <li><img src="images/slide01.jpg" alt="" /></li>
			</ul>
		</div>
	</div>
<?php // echo "</br>myPage = $myPage</br>";?>