<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont">
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
		  <label for = "paysystemname">Название платежн. системы: <input type = "text" name = "paysystemname" id = "paysystemname" value = "<?php htmlecho($paysystemname);?>"> </label>	
		</div> 
		<div>
		  <input type = "hidden" name = "idpaysystem" value = "<?php htmlecho($idpaysystem);?>">
		  <input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
		<table>
		<tr><th>Название</th><th>Возможные действия</th></tr>
		<?php if (!isset($paysystems))
		 {
			 $noPosts = '<p align = "center">Категории не добавлены</p>';
			 echo $noPosts;
			 $paysystems = null;
		 }
		 
		 else
			 
		 foreach ($paysystems as $paysystem): ?> 
			<tr>
			  <form action = " " method = "post">
			   <div>
				<td><?php htmlecho($paysystem['paysystemname']);?></td>
				<td>
				<input type = "hidden" name = "idpaysystem" value = "<?php echo $paysystem['id']; ?>">
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