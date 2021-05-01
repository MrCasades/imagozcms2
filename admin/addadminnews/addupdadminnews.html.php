<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>
	
	<div class = "maincont">
	<div class = "post">
	
	<p align = "center"><strong><?php htmlecho($errorForm); ?></strong></p>
	
	<form action = "?<?php htmlecho($action); ?> " method = "post">
	<table>
	 <div>
	  <tr>
		<th><label for = "author"> Автор:</label></th>
		<td>
		 <?php echo $authorMessage;?>
		</td>
	  </tr>
	 </div>
	<div>
	  <tr>
		<th><label for = "messagetitle">Введите заголовок </label></th>
		<td><input type = "messagetitle" name = "messagetitle" id = "messagetitle" value = "<?php htmlecho($messagetitle);?>"></td>
	  </tr>	
	</div>	
	 </table>
	 <div>
		<label for = "message"><strong>Введите текст сообщения:</strong></label><br>
		<textarea class = "descr" id = "message" name = "message" rows = "3" cols = "40"><?php htmlecho($text);?></textarea>	
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary btn-sm">
	  </div>	  
	</form>	
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>	