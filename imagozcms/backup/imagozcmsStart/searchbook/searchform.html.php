
<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<p><a href = '?add'>Добавить книгу</a></p>
	<form action = " " method = "get">
	<p>Список книг по параметрам:</p>
	 <table>
	 <div>
		<tr>
		<td><label for = "author"> По автору:</label></td>
		<td>
		<select name = "author" id = "author">
		  <option value = "">Любой автор</option>
			<?php foreach ($authors as $author): ?>
			 <option value = "<?php htmlecho($author['idauthor']); ?>"><?php htmlecho($author['authorname']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>
		</tr>	
	 </div>	
	 <div>
		<tr>
		<td><label for = "genre"> По жанру:</label></td>
		<td>
		<select name = "genre" id = "genre">
		  <option value = "">Любой жанр</option>
			<?php foreach ($genres as $genre): ?>
			 <option value = "<?php htmlecho($genre['idgenre']); ?>"><?php htmlecho($genre['genrename']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>		
		</tr>
	 </div>	
	 <div>
		<tr>
		<td><label for = "publishingcompany"> По издательству:</label></td>
		<td>
		<select name = "publishingcompany" id = "publishingcompany">
		  <option value = "">Любое издательство</option>
			<?php foreach ($publishingcompanys as $publishingcompany): ?>
			 <option value = "<?php htmlecho($publishingcompany['idcompany']); ?>"><?php htmlecho($publishingcompany['companyname']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>
		</tr>	
	 </div>
	  <div>
		<tr>
		<td><label for = "text">Содержит текст </label></td>
		<td><input type = "text" name = "text" id = "text"></td>
		</tr>
	  </div>
	  <div>
	    <tr>
		<td>
		<input type = "hidden" name = "action" value = "search">
		<input type = "submit" value = "Search">
		</td>
		<tr>
	  </div>
	 </table>	
	</form>	
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

