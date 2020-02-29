<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php'?>

<!DOCKTYPE html>
<html>
<head> 

<title><?php htmlecho($padgeTitle); ?></title> 
<meta charset = "utf-8">
<link href="http://localhost/mylibrary/styles.css" rel="stylesheet" type="text/css"> 
</head>
<body>
	<h1><?php htmlecho($padgeTitle); ?></h1>
	<div class = "maincont">
	<form action = "?<?php htmlecho($action); ?> " method = "post">
	 <div>
		<label for = "comment">Введите текст статьи</label><br>
		<textarea class = "descr" id = "comment" name = "comment" rows = "3" cols = "40"><?php htmlecho($text);?></textarea>	
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>">
	  </div>	  
	</form>	
	</div>
</body>
</html>