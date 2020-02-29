<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

<div class = "maincont">
	<p><a href = '?add' class="btn btn-primary btn-sm">Добавить ранг</a></p>
	<br>
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		<?php if (!isset($rangs))
		 {
			 $noPosts = '<p align = "center">Ранги не добавлены</p>';
			 echo $noPosts;
			 $rangs = null;
		 }
		 
		 else
			 
		 foreach ($rangs as $rang): ?> 
			<tr> 
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($rang['rangname']);?></td>
				<td>
				<input type = "hidden" name = "idrang" value = "<?php echo $rang['id']; ?>">
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