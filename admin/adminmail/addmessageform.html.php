<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
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
		<textarea class = "descr" id = "message" name = "message" data-provide="markdown" rows="10"><?php htmlecho($text);?></textarea>	
	 </div>
	 <hr/>	
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary btn-sm">
	  </div>	  
	</form>
	<p><a name="bottom"></a></p>	
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>	