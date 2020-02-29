<?php 

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
		<div>
		 Теги: <?php foreach ($metas as $meta): ?> 	  
				<div>
				 <ul class="list-inline">
					<li><a href="/imagozcms/viewmeta/?metaid=<?php echo $meta['id']; ?>"><?php echomarkdown ($meta['metaname']); ?></a></li>
				 </ul>	
				</div> 	
				<?php endforeach; ?>
		</div>
		
		<div>
		 <?php foreach ($posts as $post): ?> 	  
			<div  align="justify">
			
				<h3><?php echo ($post['posttitle']. 'Post #'.$post['id']); ?></h3>
					<p><?php echomarkdown ($post['text']); ?></p>
					<h4>Комментарии</h4>
					<a href="/imagozcms/viewpost/?addcomment" class="btn btn-primary">Добавить комментарий</a>
			</div>	   	
		 <?php endforeach; ?>
		</div>
		
		<div>
		<?php if (!isset($comments))
				{
					$noComments = 'Комментарии отсутствуют';
					echo $noComments;
					$comments = null;
				}
				
			  else
				foreach ($comments as $comment): ?> 	   		
				<div>
				 <fieldset><legend><h6><b>Прокомментировал <?php echo $comment['authorname']; ?></b> <?php echo $comment['date'];?></h6> </legend>		
				  <p><?php echomarkdown ($comment['text']); ?></p>
				   <?php 
						/*Вывод меню редактирования и удаления комментария для автора*/
						 if (isset($_SESSION['loggIn']))
						 {
							$authorName = authorLogin ($_SESSION['email'], $_SESSION['password']);//имя автора вошедшего в систему
						 }
						 else
						 {
							 $authorName = '';
						 }
						 if ($authorName == $comment['authorname'])
						 {
							 $updAnddel = '<form action = "?" method = "post">
								<div>
									<input type = "hidden" name = "id" value = "'.$comment ['id'].'">
									<input type = "submit" name = "action" class="btn btn-primary btn-sm" value = "Редактировать">
									<input type = "submit" name = "action" class="btn btn-primary btn-sm" value = "Del">
								</div>
							</form>';		 
						 }	
						 else
						 {
							 $updAnddel = '';
						 }							 
							
						 echo $updAnddel;?>
			     </fieldset>
				</div>	  		   
				<?php endforeach; ?> 	
		</div>		
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>