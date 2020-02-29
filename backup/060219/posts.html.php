<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "left_column">
		<?php 
		/*Загрузка списка рубрик*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/categorypanel/categorypanel.inc.php'; ?>
	</div>
	
	<div class = "right_column">
		<?php 
		/*Загрузка списка рубрик*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/metapanel/metapanel.inc.php'; ?>
	</div>
	
	<div class = "maincont"> 
			<p><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="//yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></p>
			
	 <h5 align = "center">Последние новости</h5>
		<?php if (!isset($newsMain))
		 {
			 $noPosts = '<p align = "center">Статьи отсутствуют</p>';
			 echo $noPosts;
			 $newsMain = null;
		 }
		 
		 else
			 
		 foreach ($newsMain as $newsMain_3): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($newsMain_3['newsdate']. ' | Автор: '.$newsMain_3['authorname']);?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $newsMain_3['categoryid']; ?>" style="color: white"><?php echo $newsMain_3['categoryname'];?></a></p>
				  </div>
					<h3 align = "center"><?php htmlecho ($newsMain_3['newstitle']); ?></h3>
				  	
					<?php if ($newsMain_3['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "40%" height = "10%" src="/imagozcms/images/'.$newsMain_3['imghead'].'"'. ' alt="'.$newsMain_3['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p><?php echo $img;?></p>
					<?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($newsMain_3['textnews'])), 0, 10))); ?> [...]</p>
					<a href="/imagozcms/viewpost/?id=<?php htmlecho ($newsMain_3['id']); ?>&<?php htmlecho ($newsMain_3['translittitle']); ?>" class="btn btn-primary">Read More</a>
				 </div>
			</div>			
		 <?php endforeach; ?>
			
		<div class = "newsblock">
		<h6>Поседние новости</h6>
		<?php if (!isset($newsIn))
		 {
			 $noPosts = '<p align = "center">Новости отсутствуют</p>';
			 echo $noPosts;
			 $newsIn = null;
		 }
		 
		 else
			 
		 foreach ($newsIn as $news): ?> 
		  
			<div>
				<strong><?php htmlecho ($news['newsdate']); ?> </strong><a href="/imagozcms/viewnews/?id=<?php htmlecho ($news['id']); ?>&<?php htmlecho ($news['translittitle']); ?>"><?php htmlecho ($news['newstitle']); ?></a>  
			</div>			
		 <?php endforeach; ?>
		 <p align = "center"><a href="/imagozcms/viewallnews/" class="btn btn-primary">Все новости</a></p>
		</div> 
		
		<div class = "imageday">
		<h6>Отражение дня</h6>
		<?php if (!isset($postsIMG))
		 {
			 $noPosts = '<p align = "center">Статьи отсутствуют</p>';
			 echo $noPosts;
			 $postsIMG = null;
		 }
		 
		 else
			 
		 foreach ($postsIMG as $postIMG): ?> 
		  
			<div>	
				<div>
				  
					<h3 align = "center"><?php htmlecho ($postIMG['posttitle']); ?></h3>
				  	
					<?php if ($postIMG['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "95%" height = "90%" src="/imagozcms/images/'.$postIMG['imghead'].'"'. ' alt="'.$postIMG['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p align = "center"><a href="/imagozcms/viewpost/?id=<?php htmlecho ($postIMG['id']); ?>&<?php htmlecho ($postIMG['translittitle']); ?>"><?php echo $img;?></a></p>
				 </div>
			</div>			
		 <?php endforeach; ?>
			
		</div>
		
		<div>
		<h5 align = "center">Последние статьи</h5>
		<?php if (!isset($posts))
		 {
			 $noPosts = '<p align = "center">Статьи отсутствуют</p>';
			 echo $noPosts;
			 $posts = null;
		 }
		 
		 else
			 
		 foreach ($posts as $post): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($post['postdate']. ' | Автор: '.$post['authorname']);?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $post['categoryid']; ?>" style="color: white"><?php echo $post['categoryname'];?></a></p>
				  </div>
					<h3 align = "center"><?php htmlecho ($post['posttitle']); ?></h3>
				  	
					<?php if ($post['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "40%" height = "10%" src="/imagozcms/images/'.$post['imghead'].'"'. ' alt="'.$post['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p><?php echo $img;?></p>
					<?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 10))); ?> [...]</p>
					<a href="/imagozcms/viewpost/?id=<?php htmlecho ($post['id']); ?>&<?php htmlecho ($post['translittitle']); ?>" class="btn btn-primary">Read More</a>
				 </div>
			</div>			
		 <?php endforeach; ?>
		 <p align = "center"><a href="/imagozcms/viewallposts/" class="btn btn-primary">Все статьи</a></p>
		</div>
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

