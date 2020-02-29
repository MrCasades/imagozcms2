<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "right_column">
		<?php 
		/*Загрузка списка рубрик*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/metapanel/metapanel.inc.php'; ?>
	</div>
	
		<div align = "center" ><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>
		
	<div class = "maincont"> 
				
	 <div class = "titles_main_padge"><h5 align = "center">Последние новости</h5></div>

	  <div>
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
				    <?php echo ($newsMain_3['newsdate']. ' | Автор: <a href="/account/?id='.$newsMain_3['idauthor'].'" style="color: white" >'.$newsMain_3['authorname']).'</a>';?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $newsMain_3['categoryid']; ?>" style="color: white"><?php echo $newsMain_3['categoryname'];?></a></p>
				  </div>
				  <div class = "newsimg">
					   <?php if ($newsMain_3['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="/images/'.$newsMain_3['imghead'].'"'. ' alt="'.$newsMain_3['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p><?php echo $img;?></p>
				  </div>
				  <div class = "newstext">
					<h5 align = "center"><?php htmlecho ($newsMain_3['newstitle']); ?></h5>
					<p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($newsMain_3['textnews'])), 0, 50))); ?> [...]</p>
					<p><a href="/viewnews/?id=<?php htmlecho ($newsMain_3['id']); ?>" class="btn btn-primary">Далее</a></p>
				  </div>
				 </div>
			</div>			
		 <?php endforeach; ?>
	  </div>
	  
		<div>
		<div class = "titles_main_padge"><h5 align = "center">Отражение дня</h5></div>
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
				  
					<h5 align = "center"><?php htmlecho ($postIMG['posttitle']); ?></h5>
				  	
					<?php if ($postIMG['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "70%" height = "70%" src="/images/'.$postIMG['imghead'].'"'. ' alt="'.$postIMG['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					<p align = "center"><a href="/viewpost/?id=<?php htmlecho ($postIMG['id']); ?>"><?php echo $img;?></a></p>
				 </div>
			</div>			
		 <?php endforeach; ?>
			
		</div>
		
		<div class = "titles_main_padge"><h5 align = "center">Промоушен</h5></div>
		
		<div>
		
		<?php if (!isset($promotions))
		 {
			 $noPosts = '<p align = "center">Статьи отсутствуют</p>';
			 echo $noPosts;
			 $promotions = null;
		 }
		 
		 else
			 
		 foreach ($promotions as $promotion): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($promotion['promotiondate']. ' | Автор: <a href="/account/?id='.$promotion['idauthor'].'" style="color: white" >'.$promotion['authorname']).'</a>';?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $promotion['categoryid']; ?>" style="color: white"><?php echo $promotion['categoryname'];?></a>
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
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallpromotion/" style="color: white"">Весь промоушен</a></p></div>
		 
		 <!-- Yandex.RTB R-A-448222-8 -->
<div id="yandex_rtb_R-A-448222-8"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-448222-8",
                renderTo: "yandex_rtb_R-A-448222-8",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
	 	
		<div class = "titles_main_padge"><h5 align = "center">Последние статьи</h5></div>
		
		<div>
		
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
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallposts/" style="color: white"">Все статьи</a></p></div>
		</div>
		<div align = "justify" class = "post">
		  <div class = "posttitle"><h6>О проекте IMAGOZ</h6></div>
			<p>Добро пожаловать на портал <strong>IMAGOZ</strong> (от лат. imago - отражение)! Здесь мы объеденили в общую картину мира тему высоких технологий (hi-tech), индустрию компьютерных игр, 
			взгляд на самые необычные современные гаджеты, достижения науки и техники и насыщенную событиями жизнь интернета.</p>
			
			<p>Такой подход является на первый взгляд несколько 
			нестандартным, но мы считаем, что все эти тематики могут органично сочетаться, заинтересовав широкий круг разносторонне развитых читателей, которые хотят быть на острие 
			прогресса!</p>

			<p>Создатели портала <strong>IMAGOZ</strong> собирают самые интересные и актуальные новости и подают их в оригинальном авторском отражении. Мы не стремимся полностью охватить этот необъятный
			мир Hi-tech, науки, игр и прочего, но публикуем самые интересные материалы по этим темам.</p>
		</div>
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

