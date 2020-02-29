<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<p align = "center"><a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a></p>	
	<div class = "maincont_for_view">
	<?php if (isset ($posts)):?>
		
		 <?php foreach ($posts as $post): ?>
	
			<div>
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($post['postdate']. ' | Автор: <a href="/account/?id='.$post['idauthor'].'" style="color: white" >'.$post['authorname']).'</a>';?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $post['categoryid']; ?>" style="color: white"><?php echo $post['categoryname'];?></a></p>
				  </div>
				  	 <div class = "newsimg">
					   <?php if ($post['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="/images/'.$post['imghead'].'"'. ' alt="'.$post['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					  <p><?php echo $img;?></p>
				     </div>
				   <div class = "newstext">
				    <h5 align = "center"><?php htmlecho ($post['posttitle']); ?></h5>
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 50))); ?> [...]</p>
					<a href="/viewpost/?id=<?php htmlecho ($post['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>		
		  	 
		 <?php endforeach; ?>
		
	<?php endif;?>
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>
