<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<?php 
	/*Загрузка списка рубрик*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/categorypanel/categorypanel.inc.php'; ?>
	
	<div class = "maincont">
	<form action = "?<?php htmlecho($action); ?> " method = "post" enctype="multipart/form-data">
	<table>
	 <div>
	  <tr>
		<td><label for = "author"> Автор:</label></td>
		<td>
		 <?php echo $authorPost;?>
		</td>
		<td>
		 <?php echo $addAuthor;?>
		</td>
	  </tr>
	 </div>
	<div>
	  <tr>
		<td><label for = "posttitle">Введите заголовок </label></td>
		<td><input type = "posttitle" name = "posttitle" id = "posttitle" value = "<?php htmlecho($posttitle);?>"></td>
	  </tr>	
	</div>	
	 <div>
	   <tr>
		<td><label for = "category"> Рубрика:</label></td>
		<td>
		<select name = "category" id = "category">
		  <option value = "">Выбрать</option>
			<?php foreach ($categorys_1 as $category): ?>
			 <option value = "<?php htmlecho($category['idcategory']); ?>"
			 <?php if ($category['idcategory'] == $idcategory)
			 {
				 echo 'selected';
			 }				 
			  ?>><?php htmlecho($category['categoryname']); ?></option>
			<?php endforeach; ?> 
		</select>
		</td>
		<td>
		 <?php echo $addCatigorys;?>
		</td>
		</tr>		
	 </div>	
	 </table>
	 <fieldset>
		<legend>Тематика <?php echo $addMetas;?></legend>
		<?php foreach ($metas_1 as $meta): ?>
		 <div>
		  <label for = "meta<?php htmlecho ($meta['idmeta']);?>">
		   <input type = "checkbox" name = "metas[]" id = "meta<?php htmlecho ($meta['idmeta']);?>"
		   value = "<?php htmlecho ($meta['idmeta']);?>"
		   <?php if ($meta['selected'])
		   {
			   echo ' checked';
		   }
		   ?>><?php htmlecho ($meta['metaname']);?>
		  </label>
		 </div>
		<?php endforeach; ?>
	 </fieldset>
	 <div>
	  <tr>
		<td><label for = "upload">Загрузите файл</label><input type = "file" name = "upload" id = "upload"></td>
		<td><input type = "hidden" name = "action" value = "upload"></td>
	  </tr>	
	</div>
	 <div>
		<label for = "post">Введите текст статьи</label><br>
		<textarea class = "descr" id = "text" name = "text" rows = "3" cols = "40"><?php htmlecho($text);?></textarea>	
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>">
	  </div>	  
	</form>	
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>	