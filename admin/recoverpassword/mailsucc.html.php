<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont">
	 <div class = "post">
	  <p align="center"><?php echo $mailSucc; ?></p>    
	  <div align="center"><a href="<?php echo '//'.$_SERVER['SERVER_NAME'];?>" class="btn btn-danger btn-sm">Главная страница</a> </div>
	 </div>
	</div>			

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>