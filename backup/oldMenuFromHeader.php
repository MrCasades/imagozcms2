<!DOCKTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/styles.css';?>" rel= "stylesheet" type="text/css">
	<meta charset = "utf-8">
</head>
<body>
	<div><p class = "logo"><img width = "70%" height = "30%" src = "http://localhost/mylibrary/myliblogo_1.jpg" alt = "MyLibrary - Каталог домашней библиотеки"></p></div><br>
	<br>
	<div class="top-menu" align="center">
    <ul>
		<li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/';?>">Главная страница</a></li>
        <li><a href='/imagozcms/searchbook/'>Поиск и управление списком</a></li>
		<li>
            <a href="#">Управление характеристиками</a>
            <ul>
                <li><a href='/imagozcms/admin/authorlist/'>Управление списком авторов</a></li>
                <li><a href='/imagozcms/admin/categorylist/'>Управление списком рубрик</a></li>
				<li><a href='/imagozcms/admin/metalist/'>Управление списком издательств</a></li>
            </ul>
        </li>
    </ul>
    </div>
	<h1><?php echo $headMain; ?> </h1>