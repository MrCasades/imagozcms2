<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<?php 
	/*Загрузка списка рубрик*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/categorypanel/categorypanel.inc.php'; ?>
	
	<div class = "maincont">
	<br>
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
			<label for = "categoryname">Название рубрики: <input type = "text" name = "categoryname" id = "categoryname" value = "<?php htmlecho($categoryname);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idcategory" value = "<?php htmlecho($idcategory);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>