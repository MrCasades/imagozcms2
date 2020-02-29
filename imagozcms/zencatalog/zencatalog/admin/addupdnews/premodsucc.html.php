<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont"> 
	 <div class = "post" align="center">
		<p>Материал отправлен на премодерацию. После проверки администратором будет опубликован!</p>
		
		<p>Число знаков в статье (без пробелов) <?php echo $lengthText;?> | Стоимость  <?php echo $fullPrice;?> , с учётом бонуса Х<?php echo $bonus;?></p>
		<a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'];?>" class="btn btn-primary btn-sm">Главная страница</a>
	 </div>	
	</div> 
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>