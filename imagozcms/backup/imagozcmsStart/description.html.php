<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php'?>


<!DOCKTYPE html>
<html>
<head> 

<title>Description</title>
<link href="http://localhost/mylibrary/styles.css" rel="stylesheet" type="text/css"> 
<meta charset = "utf-8">
</head>
<body>
<div><p class = "logo"><img width = "70%" height = "30%" src = "http://localhost/mylibrary/myliblogo_1.jpg" alt = "MyLibrary - Каталог домашней библиотеки"></p></div><br>
<br>
<center><div class="top-menu">
    <ul>
		<li><a href='http://localhost/mylibrary/'>Главная страница</a></li>
        <li><a href='/mylibrary/searchbook/'>Поиск и управление списком</a></li>
		<li>
            <a href="#">Управление характеристиками</a>
            <ul>
                <li><a href='/mylibrary/authorlist/'>Управление списком авторов</a></li>
                <li><a href='/mylibrary/genrelist/'>Управление списком жанров</a></li>
				<li><a href='/mylibrary/publishinglist/'>Управление списком издательств</a></li>
            </ul>
        </li>
    </ul>
</div></center>
<h1>Описание книги</h1>
<div class = "maincont">
<p><?php 
  $description = $_GET['description'];
  echomarkdown ($description);?> </p>
</div>
</body>
</html>