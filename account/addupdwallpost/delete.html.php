<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>

	
	<div class = "maincont"> 
	 <div class = "post" align="center">
		<p>Удалить запись</p>
		<p><form action = "?<?php htmlecho($action); ?> " method = "post">
		  <input type = "hidden" name = "idautin" value = "<?php htmlecho($idAutIn); ?>">
		  <input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		  <input type = "submit" name = "delete" class="btn btn-primary btn-sm" value = "<?php htmlecho($button); ?>">
		  <a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a>
		</form></p>
	 </div>	 
	</div>	
<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>