<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont">
	<br>
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
			<label for = "pricename">Название ценовой категории: <input type = "text" name = "pricename" id = "pricename" value = "<?php htmlecho($pricename);?>" 
			</label>	
		</div> 
		<div>
			<label for = "promotionprice">Значение: <input type = "text" name = "promotionprice" id = "promotionprice" value = "<?php htmlecho($promotionprice);?>" 
			</label>	
		</div>
		<div>
			<input type = "hidden" name = "idpromotionprice" value = "<?php htmlecho($idpromotionprice);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>