<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div>
	<br>
	<?php htmlecho($errLog);?>
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
		<div>
			<label for = "authorname">Имя автора: <input type = "text" name = "authorname" id = "authorname" value = "<?php htmlecho($authorname);?>"> 
			</label>	
		</div> 
		<div>
			<label for = "email">E-mail: <input type = "text" name = "email" id = "email" value = "<?php htmlecho($email);?>"> 
			</label>	
		</div>
		<div>
			<label for = "password">Пароль: <input type = "password" name = "password" id = "password" value = "<?php htmlecho($password);?>" 
			</label>	
		</div>
		<div>
			<label for = "password2">Повторить пароль: <input type = "password" name = "password2" id = "password2" value = "<?php htmlecho($password2);?>" 
			</label>	
		</div>
		<div>
			<label for = "www">WWW: <input type = "text" name = "www" id = "www" value = "<?php htmlecho($www);?>"> 
			</label>	
		</div>
		<div>
			<input type = "hidden" name = "role" value = "<?php htmlecho($role);?>">
			<input type = "hidden" name = "id" value = "<?php htmlecho($idauthor);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>