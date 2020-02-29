<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
		  <label for = "categoryname">Название рубрики: <input type = "text" name = "categoryname" id = "categoryname" value = "<?php htmlecho($categoryname);?>"> </label>	
		</div> 
		<div>
		  <input type = "hidden" name = "idcategory" value = "<?php htmlecho($idcategory);?>">
		  <input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		 <?php foreach ($categorys as $category): ?> 
			<tr>
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($category['categoryname']);?></td>
				<td>
				<input type = "hidden" name = "idcategory" value = "<?php echo $category['id']; ?>">
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>