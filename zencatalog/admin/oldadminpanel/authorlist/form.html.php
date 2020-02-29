<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php'?>

<!DOCKTYPE html>
<html>
<head> 

<title><?php htmlecho($padgeTitle); ?></title> 
<meta charset = "utf-8">

</head>
<body>
	<h1><?php htmlecho($padgeTitle); ?></h1>
	<div>
	<br>
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
			<label for = "www">WWW: <input type = "text" name = "www" id = "www" value = "<?php htmlecho($www);?>"> 
			</label>	
		</div>
		<div>
			<label for = "password">Пароль: <input type = "password" name = "password" id = "password" value = "<?php htmlecho($password);?>" 
			</label>	
		</div>
		<fieldset>
			<legend>Roles:</legend>
			<?php for ($i = 0; $i < count($roles); $i++): ?>
			 <div>
			  <label for = "role<?php echo $i; ?>"><input type = "checkbox" name = "roles[]" id = "role<?php echo $i; ?>" 
			  value = "<?php htmlecho($roles[$i]['id']); ?>"
			  <?php 
				if ($roles[$i]['selected'])
				{
					echo ' checked';
				}
			   ?>> <?php htmlecho($roles[$i]['id']); ?>
			  </label>:
			  <?php htmlecho($roles[$i]['descr']); ?>
			 </div>
			<?php endfor; ?> 
		</fieldset>
		<div>
			<input type = "hidden" name = "id" value = "<?php htmlecho($idauthor);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>