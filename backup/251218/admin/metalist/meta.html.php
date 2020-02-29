<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<p><a href = '?add'>Добавить тематику</a></p>
	<br>
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		 <?php foreach ($metas as $meta): ?> 
			<tr>
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($meta['metaname']);?></td>
				<td>
				<input type = "hidden" name = "idmeta" value = "<?php echo $meta['id']; ?>">
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