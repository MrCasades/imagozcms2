<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont">
	<div class = "post">
	
	<p align = "center"><strong><?php htmlecho($errorForm); ?></strong></p>
	
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
		<td><label for = "newstitle">Введите заголовок </label></td>
		<td><input type = "newstitle" name = "newstitle" id = "newstitle" value = "<?php htmlecho($newstitle);?>"></td>
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
		 <?php if (!isset($metas_1))
		 {
			 $noPosts = '<p align = "center">Теги не добавлены</p>';
			 echo $noPosts;
			 $metas_1 = null;
		 }
		 
		 else
			 
		foreach ($metas_1 as $meta): ?>
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
	  <tr>
		<td><label for = "imgalt">Введите alt-текст для изображения</label></td>
		<td><input type = "imgalt" name = "imgalt" id = "imgalt" value = "<?php htmlecho($imgalt);?>"></td>
	  </tr>	
	</div>
	<div>
	  <tr>
		<td><label for = "videoyoutube">Ссылка на видео Youtube: </label></td>
		<td><input type = "videoyoutube" name = "videoyoutube" id = "videoyoutube" value = "<?php htmlecho($videoyoutube);?>"></td>
	  </tr>	
	</div>
	<div>
		<label for = "description">Введите аннотацию новости (для тега Description)</label><br>
		<textarea class = "descr" id = "description" name = "description" rows = "3" cols = "40"><?php htmlecho($description);?></textarea>	
	 </div>
	 <div>
		<label for = "news">Введите текст новости</label><br>
		<textarea class = "descr" id = "text" name = "textnews" rows = "50" cols = "40"><?php htmlecho($text);?></textarea>	
	 </div>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary btn-sm">
	  </div>	  
	</form>	
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>	