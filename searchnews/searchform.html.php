<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>

	<div class = "maincont_for_view">
	<div class = "post_reg_log">
	<p> <a href="<?php echo '//'.MAIN_URL.'/searchpost/';?>" class="btn btn-primary btn-sm">Поиск статей</a> | 
		<a href="<?php echo '//'.MAIN_URL.'/searchpromotion/';?>" class="btn btn-primary btn-sm">Поиск промоушен-статей</a> |
		<a href="<?php echo '//'.MAIN_URL.'/searchnews/';?>" class="btn btn-info">Поиск новостей</a></p>
	<form action = " " method = "get">
	<p>Список статей по параметрам:</p>
	 <table>
	  <div>
		<tr>
		<td><label for = "newstext">Содержит текст </label></td>
		<td><input type = "text" name = "newstext" id = "newstext"></td>
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
	</div>
	
<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>

