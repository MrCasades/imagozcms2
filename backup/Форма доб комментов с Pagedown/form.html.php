<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<h1><?php htmlecho($padgeTitle); ?></h1>
	<div class = "maincont">
	
	<form action = "?<?php htmlecho($action); ?> " method = "post">
	 <div>
		<label for = "comment">Введите текст статьи</label><br>
		<div class="wmd-panel controls">
            <div id="wmd-button-bar-second"></div>
            <textarea class="wmd-input" name = "comment" id="wmd-input-second"><?php htmlecho($text);?></textarea>
		</div>
		
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>">
	  </div>	  
	</form>	
	</div>
</body>
</html>