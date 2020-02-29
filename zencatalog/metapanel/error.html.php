<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont">  
		<div class = "post" align="center">
		 <?php echo $error; ?> 
		</div>
		<div align="center"><a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a></div>
	</div>	

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>