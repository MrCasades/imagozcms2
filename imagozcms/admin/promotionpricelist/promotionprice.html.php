<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont">
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
		  <label for = "pricename">Название ценовой категории: <input type = "text" name = "pricename" id = "pricename" value = "<?php htmlecho($pricename);?>"> </label>	
		</div> 
		<div>
		  <label for = "promotionprice">Значение: <input type = "text" name = "promotionprice" id = "promotionprice" value = "<?php htmlecho($promotionprice);?>"> </label>	
		</div>
		<div>
		  <input type = "hidden" name = "idcategory" value = "<?php htmlecho($idpromotionprice);?>">
		  <input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
		<table>
		<tr><th>Название</th><th>Значение</th><th>Возможные действия</th></tr>
		<?php if (!isset($promotionprices))
		 {
			 $noPosts = '<p align = "center">Категории не добавлены</p>';
			 echo $noPosts;
			 $promotionprices = null;
		 }
		 
		 else
			 
		 foreach ($promotionprices as $promotionprice): ?> 
			<tr>
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($promotionprice['pricename']);?></td>
				<td><?php htmlecho($promotionprice['promotionprice']);?></td>
				<td>
				<input type = "hidden" name = "idpromotionprice" value = "<?php echo $promotionprice['id']; ?>">
				<input type = "submit" name = "action" value = "Upd" class="btn btn-primary btn-sm">
				<input type = "submit" name = "action" value = "Del" class="btn btn-primary btn-sm">
				</td>
			   </div>
		      </form>
			</tr>
		 <?php endforeach; ?>	
		</table>
	</div>	
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>