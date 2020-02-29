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
	<table>
	<div>
	  <tr>
		<td><label for = "text">Введите название книги </label></td>
		<td><input type = "text" name = "text" id = "text" value = "<?php htmlecho($text);?>"></td>
	  </tr>	
	</div>
	 <div>
	  <tr>
		<td><label for = "author"> Автор:</label></td>
		<td>
		<select name = "author" id = "author">
		  <option value = "">Выбрать</option>
			<?php foreach ($authors_1 as $author): ?>
			 <option value = "<?php htmlecho($author['idauthor']); ?>"
			 <?php if ($author['idauthor'] == $idauthor)
			 {
				 echo 'selected';
			 }				 
			  ?>><?php htmlecho($author['authorname']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>
	  </tr>	
	 </div>	
	 <div>
	   <tr>
		<td><label for = "genre"> Жанр:</label></td>
		<td>
		<select name = "genre" id = "genre">
		  <option value = "">Выбрать</option>
			<?php foreach ($genres_1 as $genre): ?>
			 <option value = "<?php htmlecho($genre['idgenre']); ?>"
			 <?php if ($genre['idgenre'] == $idgenre)
			 {
				 echo 'selected';
			 }				 
			  ?>><?php htmlecho($genre['genrename']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>
		</tr>	
	 </div>	
	 </table>
	 <fieldset>
		<legend>Издательство</legend>
		<?php foreach ($publishingcompanys_1 as $publishingcompany): ?>
		 <div>
		  <label for = "publishingcompany<?php htmlecho ($publishingcompany['idcompany']);?>">
		   <input type = "checkbox" name = "publishingcompanys[]" id = "publishingcompany<?php htmlecho ($publishingcompany['idcompany']);?>"
		   value = "<?php htmlecho ($publishingcompany['idcompany']);?>"
		   <?php if ($publishingcompany['selected'])
		   {
			   echo ' checked';
		   }
		   ?>><?php htmlecho ($publishingcompany['companyname']);?>
		  </label>
		 </div>
		<?php endforeach; ?>
	 </fieldset>
	 <div>
		<label for = "description">Введите описание</label><br>
		<textarea class = "descr" id = "text" name = "description" rows = "3" cols = "40"><?php htmlecho($description);?></textarea>	
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>">
	  </div>	  
	</form>	
	</div>
</body>
</html>