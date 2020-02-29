<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<p><a href = '?add'>Добавить жанр</a></p>
	<br>
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		 <?php foreach ($genres as $genre): ?> 
			<tr> 
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($genre['genrename']);?></td>
				<td>
				<input type = "hidden" name = "idgenre" value = "<?php echo $genre['idgenre']; ?>">
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