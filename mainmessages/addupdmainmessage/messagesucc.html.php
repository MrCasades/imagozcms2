<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont"> 
	 <div class = "post" align="center">
		<p>Вы успешно отправили сообщение!</p>
		<a href="<?php echo '//'.$_SERVER['SERVER_NAME'].'/mainmessages/#bottom';?>" class="btn btn-primary btn-sm">К диалогам</a>
	 </div>	
	</div> 
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>