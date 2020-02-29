<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont_for_view"> 
		<div align = "center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>
	  <div class = "post">
		<h6>Поседние новости</h6>
		 <?php 
		 if (!isset($newsIn))
		 {
			 $noNews = '<p align = "center">Новости в рубрике отсутствуют!</p>';
			 echo $noNews;
			 $newsIn = null;
		 }
			
		 else
			 
		 foreach ($newsIn as $news): ?> 
		  
			<div>
				<strong><?php htmlecho ($news['newsdate']); ?> </strong><a href="/viewnews/?id=<?php htmlecho ($news['id']); ?>"><?php htmlecho ($news['newstitle']); ?></a>  
			</div>			
		 <?php endforeach; ?>
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallnewsincat/?id=<?php echo $idCategory;?>" style="color: white">Все новости рубрики</a></p></div>
		</div>   
		
		<div>	
		<h5 align = "center">Промоушен</h5>
		 <?php 
		 if (!isset($promotions))
		 {
			 $noPosts = '<p align = "center">Статьи в рубрике отсутствуют!</p>';
			 echo $noPosts;
			 $promotions = null;
		 }
			
		 else
			 
		 foreach ($promotions as $promotion): ?> 
		  
			<div>
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($promotion['promotiondate']. ' | Автор: <a href="/account/?id='.$promotion['idauthor'].'" style="color: white" >'.$promotion['authorname']).'</a>';?>
					<p>Рубрика: <a href="/viewcategory/?id=<?php echo $promotion['categoryid']; ?>" style="color: white"><?php echo $promotion['categoryname'];?></a>
					   <?php if ($promotion['www'] != '')//если автор приложил ссылку
						{
							$link = '| <a href="//'.$promotion['www'].'" style="color: white" rel = "nofollow">Ссылка на ресурс</a>';
							echo $link;
						}?></p>
				  </div>
				  	 <div class = "newsimg">
					   <?php if ($promotion['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="/images/'.$promotion['imghead'].'"'. ' alt="'.$promotion['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					  <p><?php echo $img;?></p>
				     </div>
				   <div class = "newstext">
				    <h5 align = "center"><?php htmlecho ($promotion['promotiontitle']); ?></h5>
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($promotion['text'])), 0, 50))); ?> [...]</p>
					<a href="/viewpromotion/?id=<?php htmlecho ($promotion['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>	   	
		 <?php endforeach; ?> 
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallpromotionincat/?id=<?php echo $idCategory; ?>" style="color: white">Все статьи рубрики</a></p></div>
	  </div>	 
		
	  <div>	
		<h5 align = "center">Последние статьи</h5>
		 <?php 
		 if (!isset($posts))
		 {
			 $noPosts = '<p align = "center">Статьи в рубрике отсутствуют!</p>';
			 echo $noPosts;
			 $posts = null;
		 }
			
		 else
			 
		 foreach ($posts as $post): ?> 
		  
			<div>
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($post['postdate']. ' | Автор: <a href="/account/?id='.$post['idauthor'].'" style="color: white" >'.$post['authorname']).'</a>';?>
					<p>Рубрика: <a href="/viewcategory/?id=<?php echo $post['categoryid']; ?>" style="color: white"><?php echo $post['categoryname'];?></a></p>
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
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallpostsincat/?id=<?php echo $idCategory; ?>" style="color: white">Все статьи рубрики</a></p></div>
	  </div>	 
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>