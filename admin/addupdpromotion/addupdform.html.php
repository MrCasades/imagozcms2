<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont">
	<div class = "post">
	
	<p align = "center"><strong><?php htmlecho($errorForm); ?></strong></p>
	
	<form action = "?<?php htmlecho($action); ?> " method = "post" enctype="multipart/form-data" autocomplete="on">
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
		<td><label for = "promotiontitle">Введите заголовок </label></td>
		<td><input type = "promotiontitle" name = "promotiontitle" id = "promotiontitle" value = "<?php htmlecho($promotiontitle);?>"></td>
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
		<td><label for = "upload">Загрузите файл изображения для шапки</label><input type = "file" name = "upload" id = "upload"></td>
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
		<td><label for = "www">Введите ссылку на сайт (при необходимости). </label></td>
		<td><input type = "www" name = "www" id = "www" value = "<?php htmlecho($www);?>" placeholder = "Без http://"></td>
	  </tr>	
	</div>
	<div>
	  <tr>
		<td><label for = "videoyoutube">Ссылка на видео Youtube: </label></td>
		<td><input type = "videoyoutube" name = "videoyoutube" id = "videoyoutube" value = "<?php htmlecho($videoyoutube);?>"></td>
	  </tr>	
	</div>
	<div>
		<label for = "description">Введите краткое описание (250 знаков)</label><br>
		<textarea class = "descr" id = "description" name = "description" rows = "3" cols = "40" placeholder = "Опишите в паре предложений суть материала"><?php htmlecho($description);?></textarea>	
	 </div>
		<h5>Подсказка по разметке текста</h5>
		 <ul>
			<li>Синтаксис ссылки на сторонний ресурс: [текст ссылки](ссылка)</li>
			<li>Выделение <em>курсивом</em>: _текст_</li>
			<li>Выделение <strong>жирным шрифтом</strong>: **текст**</li>
			<li><p><strong>Для вставки изображения</strong> в текст воспользуйтесь любым файловым хостингом (например <strong>https://ipic.su/</strong>, главное получить 
				   прямую ссылку на картинку вида "сайт.ru/картинка.jpg")</p>
				<p><strong>Синтаксис вставки:</strong> ![подпись](прямая ссылка на изображение)</p>
				<p>ВАЖНО! На картинках не должно быть водяных знаков сторонних ресурсов. Само изображение желательно минимально обработать, если оно неоригинальное.
				   (Хотябы немного обрезать, отзеркалить и т.п.)</p></li>
		 </ul>	
	 <div>
		<label for = "promotion">Введите текст статьи</label><br>
		<textarea class = "descr" id = "text" name = "text" data-provide="markdown" rows="10" placeholder = "Добавьте текст"><?php htmlecho($text);?></textarea>	
	 </div>
	 <hr/>
	  <div>
		<input type = "hidden" name = "id" value = "<?php htmlecho($id); ?>">
		<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary btn-sm">
	  </div>	  
	</form>	
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>	