
<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php'?>

<!DOCKTYPE html>
<html>
<head> 

<title>SearchBook</title> 
<meta charset = "utf-8">
</head>
<body>
		
	<h1>Результаты поиска</h1>
	<div class = "maincont">
	<?php if (isset ($books)):?>
		<table>
		 <tr><th>Название нкиги</th><th>Возможные действия</th></tr>
		 <?php foreach ($books as $book): ?>
		 <tr>
		  <td><a href = "description.html.php?description=<?php htmlecho($book['description']);?>"><?php htmlecho ($book ['text']); ?></a></td>
		  <td>
		   <form action = "?" method = "post">
			<div>
			 <input type = "hidden" name = "id" value = "<?php htmlecho ($book ['idbook']);?>">
			 <input type = "submit" name = "action" value = "Upd">
			 <input type = "submit" name = "action" value = "Del">
			</div>
		   </form>
		  </td>
		 </tr> 
		 <?php endforeach; ?>
		</table> 
	<?php endif;?>
	</div>
</body>
</html>