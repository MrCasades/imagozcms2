<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<p><a href = '?add'>Добавить рубрику</a></p>
	<br>
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		 <?php foreach ($categorys as $category): ?> 
			<tr> 
			  <form action = "?" method = "post">
			   <div>
				<td><?php htmlecho($category['categoryname']);?></td>
				<td>
				<input type = "hidden" name = "idcategory" value = "<?php echo $category['id']; ?>">
				<input type = "submit" name = "action" value = "Upd">
				<input type = "submit" name = "action" value = "Del">
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