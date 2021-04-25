<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>
	
	<div class = "maincont_for_view"> 
			<div align = "center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="//yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>
		
		<div>
        <h3 align = "center">Новости по тегу</h3>
		 <?php 
		 if (empty ($metas_news))
		 {
			 echo '<p align = "center">Новости в рубрике отсутствуют!</p>';
		 }
		 
		 else
			 
		 foreach ($metas_news as $meta_1): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($meta_1['newsdate']. ' | Автор: <a href="../account/?id='.$meta_1['idauthor'].'" style="color: white" >'.$meta_1['authorname']).'</a>';?>
					<p>Рубрика: <a href="../viewcategory/?id=<?php echo $meta_1['categoryid']; ?>" style="color: white"><?php echo $meta_1['categoryname'];?></a></p>
				  </div>
				  <div class = "newstext">
					<h3 align = "center"><?php htmlecho ($meta_1['newstitle']); ?></h3>
					  <div class = "newsimg">
					   <?php if ($meta_1['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="../images/'.$meta_1['imghead'].'"'. ' alt="'.$meta_1['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p><?php echo $img;?></p>
				  </div>  
					<p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($meta_1['textnews'])), 0, 50))); ?> [...]</p>
					<p><a href="../viewnews/?id=<?php htmlecho ($meta_1['id']); ?>" class="btn btn-primary">Далее</a></p>
				  </div>
				 </div> 
			</div>			
		 <?php endforeach; ?>
         <div class="for_allposts_link"><p align = "center"><a href="../viewmetanews/?id=<?php echo $idCategory; ?>" style="color: white">Все новости</a></p></div>	
		</div>

        <div>
        <h3 align = "center">Промоушен по тегу</h3>
		 <?php 
		 if (empty ($metas_prom))
		 {
			 echo '<p align = "center">Данному тегу не соответствует ни одна статья</p>';
		 }
			
		 else
			 
		 foreach ($metas_prom as $meta_1): ?> 
		  
			<div>
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($meta_1['promotiondate']. ' | Автор: <a href="../account/?id='.$meta_1['idauthor'].'" style="color: white" >'.$meta_1['authorname']).'</a>';?>
					<p>Рубрика: <a href="../viewcategory/?id=<?php echo $meta_1['categoryid']; ?>" style="color: white"><?php echo $meta_1['categoryname'];?></a>
					   <?php if ($meta_1['www'] != '')//если автор приложил ссылку
						{
							$link = '| <a href="//'.$meta_1['www'].'" style="color: white" rel = "nofollow">Ссылка на ресурс</a>';
							echo $link;
						}?></p>
				  </div>
				   <div class = "newstext">
				    <h3 align = "center"><?php htmlecho ($meta_1['promotiontitle']); ?></h3>
					   <div class = "newsimg">
					   <?php if ($meta_1['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="../images/'.$meta_1['imghead'].'"'. ' alt="'.$meta_1['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					  <p><?php echo $img;?></p>
				     </div>
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($meta_1['text'])), 0, 50))); ?> [...]</p>
					<a href="../viewpromotion/?id=<?php htmlecho ($meta_1['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>	   	
		 <?php endforeach; ?> 	
		</div> 

        <div>
        <h3 align = "center">Статьи по тегу</h3>
		 <?php 
		 if (empty ($metas_post))
		 {
			 echo '<p align = "center">Данному тегу не соответствует ни одна статья</p>';
		 }
			
		 else
			 
		 foreach ($metas_post as $meta_1): ?> 
		  
			<div>
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($meta_1['postdate']. ' | Автор: <a href="../account/?id='.$meta_1['idauthor'].'" style="color: white" >'.$meta_1['authorname']).'</a>';?>
					<p>Рубрика: <a href="../viewcategory/?id=<?php echo $meta_1['categoryid']; ?>" style="color: white"><?php echo $meta_1['categoryname'];?></a></p>
				  </div>
				   <div class = "newstext">
				    <h3 align = "center"><?php htmlecho ($meta_1['posttitle']); ?></h3>
					   <div class = "newsimg">
					   <?php if ($meta_1['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="../images/'.$meta_1['imghead'].'"'. ' alt="'.$meta_1['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					  <p><?php echo $img;?></p>
				     </div>
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($meta_1['text'])), 0, 50))); ?> [...]</p>
					<a href="../viewpost/?id=<?php htmlecho ($meta_1['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>	   	
		 <?php endforeach; ?> 		
		</div> 
	</div>		

<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>