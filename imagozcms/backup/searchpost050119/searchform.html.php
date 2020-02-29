
<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	<form action = " " method = "get">
	<p>Список статей по параметрам:</p>
	 <table>
	  <div>
		<tr>
		<td><label for = "text">Содержит текст </label></td>
		<td><input type = "text" name = "text" id = "text"></td>
		</tr>
	  </div>	 
	 <div>
		<tr>
		<td><label for = "category"> По рубрике:</label></td>
		<td>
		<select name = "category" id = "category">
		  <option value = "">Любая рубрика</option>
			<?php foreach ($categorys as $category): ?>
			 <option value = "<?php htmlecho($category['id']); ?>"><?php htmlecho($category['categoryname']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>		
		</tr>
	 </div>	
	  <div>
	    <tr>
		<td>
		<input type = "hidden" name = "action" value = "search">
		<input type = "submit" value = "Найти" class="btn btn-primary btn-sm">
		</td>
		<tr>
	  </div>
	 </table>	
	</form>	
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

