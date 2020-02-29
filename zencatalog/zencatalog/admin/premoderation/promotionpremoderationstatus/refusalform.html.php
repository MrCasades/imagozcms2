<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	  <div class = "maincont"> 
	   <div class = "post" align = "center">
		  <p><?php htmlecho($premodYes); ?> "<?php htmlecho($posttitle); ?>"?</p>
	   <p>
	    <form action = "?<?php htmlecho($action); ?> " method = "post">		
			<p><label for = "reasonrefusal">Причина отказа </label>
			<textarea class = "descr" id = "reasonrefusal" name = "reasonrefusal" rows = "3" cols = "40"><?php htmlecho($reasonrefusal);?></textarea>  </p>	
		 <p> <input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		  <input type = "submit" name = "delete" class="btn btn-primary btn-sm" value = "<?php htmlecho($button); ?>"></p>
	    </form>
	   </p>
	 
	   <a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a>
	   </div>
	</div>	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>