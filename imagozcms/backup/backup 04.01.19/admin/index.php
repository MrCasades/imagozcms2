<?php
$title = 'Панель администратора';//Данные тега <title>
$headMain = 'Разделы';?>

<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>



	<div class = "maincont">
		<ul>
		 <li><a href='/imagozcms/admin/authorlist/'>Управление списком авторов</a></li>
         <li><a href='/imagozcms/admin/categorylist/'>Управление списком рубрик</a></li>
		 <li><a href='/imagozcms/admin/metalist/'>Управление списком тематик</a></li>
		 <li><a href='/imagozcms/admin/searchpost/'>Управление статьями</a></li>
		</ul>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>