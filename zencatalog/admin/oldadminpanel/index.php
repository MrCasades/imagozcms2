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
		 <li><a href='/admin/oldadminpanel/authorlist/'>Управление списком авторов</a></li>
         <li><a href='/admin/oldadminpanel/categorylist/'>Управление списком рубрик</a></li>
		 <li><a href='/admin/oldadminpanel/metalist/'>Управление списком тематик</a></li>
		 <li><a href='/admin/oldadminpanel/searchpost/'>Управление статьями</a></li>
		</ul>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>