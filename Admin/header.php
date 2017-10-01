<?php
    require_once ("../includes/simplecms-config.php");
    require_once ("../includes/connectDB.php");

    $myPage = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE>
<head>
	<title>РИДы 08 Департамента</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-type" content="image/gif" />
	<link rel="shortcut icon" type="image/x-icon" href="/css/images/favicon.ico" />
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all" />
	
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
		<h1 id="logo"><a href="/Admin/"><span class="min"><span class="red">08</span> Департамент</span></a></h1>


        <div class="container">
                <ul id="topnav">
                    <li><a href="/Admin/">Home</a></li>
                    <li><a href="addpatent.php">Патенты</a>
                        <span>
                            <a href="addpatent.php">Добавить</a> |
                            <a href="/editpatent.php">Редактировать</a> |
                            <a href="/deletepatent">Удалить</a> |
                            <a href="">&nbsp;</a>
                        </span>
                    </li>
                    <li><a href="/adnouhau.php">Ноу Хау</a></li>
                    <li>
                        <a href="/adduty.php">Пошлины</a>
                        <span>
                            <a href="/grafpay.php">График платежей</a> |
                            <a href="">&nbsp;</a> |
                            <a href="">&nbsp;</a> |
                            <a href="">&nbsp;</a>
                        </span>
                    </li>
                </ul>
        </div>

	</div>