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
			<label for = "authorname">Имя автора: <input type = "text" name = "authorname" id = "authorname" value = "<?php htmlecho($authorname);?>" 
			</label>	
		</div> 
		<div>
			<label for = "dateofbirth">Год рождения: <input type = "text" name = "dateofbirth" id = "dateofbirth" value = "<?php htmlecho($dateofbirth);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idauthor" value = "<?php htmlecho($idauthor);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>