<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont">
	<br>
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
			<label for = "contestname">Название конкурса: <input type = "text" name = "contestname" id = "contestname" value = "<?php htmlecho($contestname);?>" 
			</label>	
		</div> 
		<div>
			<label for = "votingpoints">Очки за голосование: <input type = "text" name = "votingpoints" id = "votingpoints" value = "<?php htmlecho($votingpoints);?>" 
			</label>	
		</div>
		<div>
			<label for = "commentpoints">Очки за комментарии: <input type = "text" name = "commentpoints" id = "commentpoints" value = "<?php htmlecho($commentpoints);?>" 
			</label>	
		</div>
		<div>
			<input type = "hidden" name = "idcontest" value = "<?php htmlecho($idcontest);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>" class="btn btn-primary btn-sm">
		</div>
	</form>	
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>