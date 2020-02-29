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
			<label for = "authorname">Название тематики: <input type = "text" name = "metaname" id = "metaname" value = "<?php htmlecho($metaname);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idmeta" value = "<?php htmlecho($idmeta);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>