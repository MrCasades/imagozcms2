<!DOCKTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/styles.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/css/bootstrap.css';?>" rel= "stylesheet" type="text/css">
	<meta charset = "utf-8">
</head>
<body>
	<div><p class = "logo"><img width = "70%" height = "30%" src = "http://localhost/mylibrary/myliblogo_1.jpg" alt = "MyLibrary - Каталог домашней библиотеки"></p></div><br>
	<br>
	<form action = " " method = "post">
	<div>
	  <?php 
		/*Загрузка функций в шаблон*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';
		/*Загрузка меню авторизации*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/admin/logpanel.html.inc.php';
		echo $logPanel; ?>
	</div>	
	</form>
	<div class="top-menu" align="center">
    <ul>
		<li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/';?>">Главная страница</a></li>
        <li><a href='/imagozcms/searchpost/'>Поиск статей</a></li>
		<li><a href='/imagozcms/admin/'>Панель администрирования</a>
    </ul>
    </div>
	<h1><?php echo $headMain; ?> </h1>