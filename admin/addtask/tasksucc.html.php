<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont"> 
	 <div class = "post" align="center">
		<p>Техническое задание добавлено на сайт!</p>
		<a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'];?>" class="btn btn-primary btn-sm">Главная страница</a>
	 </div>	
	</div> 
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>