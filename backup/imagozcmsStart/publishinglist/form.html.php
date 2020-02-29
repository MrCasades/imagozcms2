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
			<label for = "authorname">Название издательства: <input type = "text" name = "companyname" id = "companyname" value = "<?php htmlecho($companyname);?>" 
			</label>	
		</div> 
		<div>
			<input type = "hidden" name = "idcompany" value = "<?php htmlecho($idcompany);?>">
			<input type = "submit" value = "<?php htmlecho($button);?>">
		</div>
	</form>	
	</div>
</body>
</html>