<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<p><a href = '?add'>Добавить издательство</a></p>
	<br>
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		 <?php foreach ($publishingcompanys as $publishingcompany): ?> 
			<tr>
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($publishingcompany['companyname']);?></td>
				<td>
				<input type = "hidden" name = "idcompany" value = "<?php echo $publishingcompany['idcompany']; ?>">
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