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
			<label for = "categoryname">Название жанра: <input type = "text" name = "categoryname" id = "categoryname" value = "<?php htmlecho($categoryname);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idcategory" value = "<?php htmlecho($idcategory);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>