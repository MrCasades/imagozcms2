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
			<label for = "authorname">Название жанра: <input type = "text" name = "genrename" id = "genrename" value = "<?php htmlecho($genrename);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idgenre" value = "<?php htmlecho($idgenre);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>