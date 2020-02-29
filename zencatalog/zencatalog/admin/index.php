<?php
$title = 'Панель администратора';//Данные тега <title>
$headMain = 'Разделы';
$robots = 'noindex, nofollow';
$descr = 'Старая панель администрироваения';?>

<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>



	<div class = "maincont">
		<ul>
		 <li><a href='/admin/authorlist/'>Управление списком авторов</a></li>
         <li><a href='/admin/categorylist/'>Управление списком рубрик</a></li>
		 <li><a href='/admin/metalist/'>Управление списком тематик</a></li>
		 <li><a href='/admin/searchpost/'>Управление статьями</a></li>
		 <li><a href='/admin/ranglist/'>Управление рангами</a></li>
		 <li><a href='/admin/paysystemlist/'>Управление списком платёжных систем</a></li>
		 <li><a href='/admin/tasktypelist/'>Управление типами задания</a></li>
		 <li><a href='/admin/promotionpricelist/'>Управление ценой промоушена</a></li>
		</ul>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>