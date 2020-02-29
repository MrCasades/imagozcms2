<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont">
	<div class = "post">
	
	<p align = "center"><strong><?php htmlecho($errorForm); ?></strong></p>
	
	<form action = "?<?php htmlecho($action); ?> " method = "post">
	<table>
	 <div>
	  <tr>
		<td><label for = "author"> Автор:</label></td>
		<td>
		 <?php echo $authorname;?>
		</td>
	  </tr>
	 </div>
	<div>
	  <tr>
		<td><label for = "score"> Размер счёта:</label></td>
		<td>
		 <?php echo $score;?>
		</td>
	  </tr>
	 </div>
	 <div>
	  <tr>
		<td><label for = "paysystemname"> Платёжная система:</label></td>
		<td>
		 <?php echo $paysystemname;?>
		</td>
	  </tr>
	 </div>
	 <div>
	  <tr>
		<td><label for = "ewallet"> Номер счёта:</label></td>
		<td>
		 <?php echo $ewallet;?>
		</td>
	  </tr>
	 </div>
	<div>
	  <tr>
		<td><label for = "payment">Введите сумму </label></td>
		<td><input type = "payment" name = "payment" id = "payment" value = "<?php htmlecho($payment);?>"></td>
	  </tr>	
	</div>
	</table>
	 <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($idauthor); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary btn-sm">
	  </div>	  
	</form>	
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>	