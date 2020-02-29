<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';

/*Загрузка adminnews*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/adminnews.inc.html.php';

?>
 <div class = "maincont_for_view">
		<div align = "center" ><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>

   <div class = "titles_main_padge"><h4 align = "center">Новостная лента</h4></div>
	<div class="columns">
		<?php if (empty ($newsIn))
		 {
			 echo '<p align = "center">Новости отсутствуют</p>';
		 }
		 
		 else
			 
		 foreach ($newsIn as $news): ?> 
		<div class="columns__panel">
         <div class="columns__panel-content">
			<div class = "post_for_columns" style = "background: url(/images/<?php echo $news['imghead']; ?>); background-size: cover; ">
				<div  class = "posttitle"><strong><?php echo date("Y.m.d H:i", strtotime($news['newsdate'])); ?> </strong></div>
				<a href="/viewnews/?id=<?php htmlecho ($news['id']); ?>" rel = "nofollow">.</a>
			</div>
			<strong><a href="/viewnews/?id=<?php htmlecho ($news['id']); ?>"><?php htmlecho ((implode(' ', array_slice(explode(' ', strip_tags($news['newstitle'])), 0, 7)))); ?>...</a></strong> 
		  </div>	 
		</div>	 
		 <?php endforeach; ?>
	</div>	
	<div class="for_allposts_link"><p align = "center"><a href="/viewallnews/" style = "color: white">Все новости</a></p></div>
	  
	 <div>
		 <table cellspacing="5">
		 <tr>
		  <td valign="top"><label for = "meta">Теги:</label></td>
			   <?php if (empty($metas_1))
		 {
			 echo '<p align = "center">Нет тегов</p>';
		 }
		 
		 else
		
		foreach ($metas_1 as $meta): ?> 	  
				<td><div>	 
					<strong><a href="/viewmetanews/?metaid=<?php echo $meta['id']; ?>"> <strong><?php echomarkdown ($meta['meta']); ?></strong></a></strong>	 
				</div></td> 	
				<?php endforeach; ?>
		  </tr>
		 </table>
		</div>
	 
	 <h4 align = "center">Топ-5 новостей</h4>
	 <div class="columns">
	 <?php if (empty ($newsInTOP))
		 {
			 echo '<p align = "center">Нет статей</p>';
		 }
		 
		 else
		
		foreach ($newsInTOP as $newsTOP): ?> 
	  <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <img width = "8%" height = "8%" src="../view.jpg" alt="Число просмотров материала" title="Просмотры"> <?php htmlecho ($newsTOP['viewcount']); ?> 
		  <img width = "5%" height = "5%" src="../like.jpg" alt="Оценка материала" title="Оценка"> <?php htmlecho ($newsTOP['averagenumber']); ?>			
			<a href="/viewnews/?id=<?php echo $newsTOP['id']; ?>"> <?php echomarkdown ($newsTOP['newstitle']); ?></a>
		</div>
	  </div>
	</div>
	 <?php endforeach; ?>
	 <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <p>Вывести весь топ</p>
		</div>
	  </div>
	 </div>	 
	</div> 
	 <!-- Yandex.RTB R-A-448222-13 -->
<div id="yandex_rtb_R-A-448222-13"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-448222-13",
                renderTo: "yandex_rtb_R-A-448222-13",
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
	 
    <div class = "titles_main_padge"><h4 align = "center">Пользователи рекомендуют:</h4></div>	

	<div class="columns">
		<?php if (empty($newsIn))
		 {
			 echo '<p align = "center">Рекомендации отсутствуют</p>';
		 }
		 
		 else
			 
		 foreach ($lastRecommPosts as $lastRecommPost): ?> 
		<div class="columns__panel">
         <div class="columns__panel-content">
			<div class = "post_for_columns" style = "background: url(/images/<?php echo $lastRecommPost['imghead']; ?>); background-size: cover; ">
				<div  class = "posttitle"><strong><?php echo date("Y.m.d H:i", strtotime($lastRecommPost['postdate'])); ?> </strong></div>
				<a href="/viewpost/?id=<?php htmlecho ($lastRecommPost['id']); ?>" rel = "nofollow">.</a>
			</div>
			<strong><a href="/viewpost/?id=<?php htmlecho ($lastRecommPost['id']); ?>"><?php htmlecho ((implode(' ', array_slice(explode(' ', strip_tags($lastRecommPost['posttitle'])), 0, 7)))); ?>...</a></strong> 
		  </div>	 
		</div>	 
		 <?php endforeach; ?>
	</div>	
	<div class="for_allposts_link"><p align = "center"><a href="/viewallrecommpost/" style = "color: white">Все рекомендации</a></p></div>
			 	
		<div>
		<div class = "titles_main_padge"><h4 align = "center">Отражение дня</h4></div>
		<?php if (empty ($postsIMG))
		 {
			 echo '<p align = "center">Статьи отсутствуют</p>';
		 }
		 
		 else
			 
		 foreach ($postsIMG as $postIMG): ?> 
		  	  
					<h3 align = "center"><?php htmlecho ($postIMG['posttitle']); ?></h3>
				  	
					<?php if ($postIMG['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '/images/'.$postIMG['imghead'];//если картинка присутствует
						}?>
			<div>	
				 <div class = "post_imd_day" style = "background: url(<?php echo $img; ?>); background-size: cover; ">
					 <a href="/viewpost/?id=<?php htmlecho ($postIMG['id']); ?>" rel = "nofollow">.</a>
				 </div>
			</div>			
		 <?php endforeach; ?>
			
		</div>
	 
	 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- for_main_page_new -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1348880364936413"
     data-ad-slot="4608956908"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
		
		<div class = "titles_main_padge"><h4 align = "center">Промоушен</h4></div>
		
		<div>
		
		<?php if (empty ($promotions))
		 {
			 echo '<p align = "center">Статьи отсутствуют</p>';
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
				  	 
				   <div class = "newstext">
				    <h3 align = "center"><?php htmlecho ($promotion['promotiontitle']); ?></h3>
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
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($promotion['text'])), 0, 50))); ?> [...]</p>
					<a href="/viewpromotion/?id=<?php htmlecho ($promotion['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>			
		 <?php endforeach; ?>
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallpromotion/" style="color: white">Весь промоушен</a></p></div>
			
		<div>
		 <table cellspacing="5">
		 <tr>
		  <td valign="top"><label for = "meta">Теги:</label></td>
			   <?php if (empty ($metas_3))
		 {
			 echo '<p align = "center">Нет тегов</p>';
		 }
		 
		 else
		
		foreach ($metas_3 as $meta): ?> 	  
				<td><div>	 
					<strong><a href="/viewmetapromotion/?metaid=<?php echo $meta['id']; ?>"> <strong><?php echomarkdown ($meta['meta']); ?></strong></a></strong>	 
				</div></td> 	
				<?php endforeach; ?>
		  </tr>
		 </table>
		</div>	
			
		<h4 align = "center">Топ-5 промоушен</h4>
	 <div class="columns">
	 <?php if (empty($promotionsTOP))
		 {
			 echo '<p align = "center">Нет статей</p>';
		 }
		 
		 else
		
		foreach ($promotionsTOP as $promotionTOP): ?> 
	  <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <img width = "8%" height = "8%" src="../view.jpg" alt="Число просмотров материала" title="Просмотры"> <?php htmlecho ($promotionTOP['viewcount']); ?> 
		  <img width = "5%" height = "5%" src="../like.jpg" alt="Оценка материала" title="Оценка"> <?php htmlecho ($promotionTOP['averagenumber']); ?>			
			<a href="/viewpromotion/?id=<?php echo $promotionTOP['id']; ?>"> <?php echomarkdown ($promotionTOP['promotiontitle']); ?></a>
		</div>
	  </div>
	</div>
	 <?php endforeach; ?>
	 <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <p>Вывести весь топ</p>
		</div>
	  </div>
	 </div>	 
	</div> 	
		 
		<div class="for_mainpage_direct">
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
	 	</div>
		<div class = "titles_main_padge"><h4 align = "center">Последние статьи</h4></div>
		
		<div>
		
		<?php if (empty ($posts))
		 {
			 echo '<p align = "center">Статьи отсутствуют</p>';
		 }
		 
		 else
			 
		 foreach ($posts as $post): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($post['postdate']. ' | Автор: <a href="/account/?id='.$post['idauthor'].'" style="color: white" >'.$post['authorname']).'</a>';?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $post['categoryid']; ?>" style="color: white"><?php echo $post['categoryname'];?></a></p>
				  </div>
				  	
				   <div class = "newstext">
				    <h3 align = "center"><?php htmlecho ($post['posttitle']); ?></h3>
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
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 50))); ?> [...]</p>
					<a href="/viewpost/?id=<?php htmlecho ($post['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>			
		 <?php endforeach; ?>
		 <div class="for_allposts_link"><p align = "center"><a href="/viewallposts/" style="color: white"">Все статьи</a></p></div>
		
		<div>
		 <table cellspacing="5">
		 <tr>
		  <td valign="top"><label for = "meta">Теги:</label></td>
			   <?php if (empty ($metas_2))
		 {
			 echo '<p align = "center">Нет тегов</p>';
		 }
		 
		 else
		
		foreach ($metas_2 as $meta): ?> 	  
				<td><div>	 
					<strong><a href="/viewmetapost/?metaid=<?php echo $meta['id']; ?>"> <strong><?php echomarkdown ($meta['meta']); ?></strong></a></strong>	 
				</div></td> 	
				<?php endforeach; ?>
		  </tr>
		 </table>
		</div>	
			
		<h4 align = "center">Топ-5 статей</h4>
	 <div class="columns">
	 <?php if (empty ($postsTOP))
		 {
			 echo '<p align = "center">Нет статей</p>';
		 }
		 
		 else
		
		foreach ($postsTOP as $postTOP): ?> 
	  <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <img width = "8%" height = "8%" src="../view.jpg" alt="Число просмотров материала" title="Просмотры"> <?php htmlecho ($postTOP['viewcount']); ?> 
		  <img width = "5%" height = "5%" src="../like.jpg" alt="Оценка материала" title="Оценка"> <?php htmlecho ($postTOP['averagenumber']); ?>			
			<a href="/viewpost/?id=<?php echo $postTOP['id']; ?>"> <?php echomarkdown ($postTOP['posttitle']); ?></a>
		</div>
	  </div>
	</div>
	 <?php endforeach; ?>
	 <div class="columns__panel">
       <div class="columns__panel-content">	   
		<div class = "fortop5">  
          <p>Вывести весь топ</p>
		</div>
	  </div>
	 </div>	 
	</div>
			 
	<div class = "titles_main_padge"><h4 align = "center">Наши авторы. Топ 7</h4></div>
	 <div class="columns">		 
	 <?php if (empty ($authorsTOP))
		 {
			 echo '<p align = "center">Нет авторов</p>';
		 }
		 
		 else
		
		foreach ($authorsTOP as $authorTOP): ?> 
		<div class="columns__panel">
          <div class="columns__panel-content">	  
			 <div class = "fortop5">  
			  <img width = "40 px" height = "40 px" src="/avatars/<?php echo $authorTOP['avatar'];?>" alt="<?php echo $authorTOP['authorname'];?>">
			  <a href="/account/?id=<?php echo $authorTOP['id'];?>"><?php echo $authorTOP['authorname'];?></a>
			 </div>
		  </div>
		</div>	 
	 <?php endforeach; ?>
	</div>		
			 
	<script type="text/javascript">
teasernet_blockid = 902572;
teasernet_padid = 319119;
</script>
<script type="text/javascript" src="//mdyhb.com/c3c/21b5/59/e56c4c/d4d1.js"></script>
			 		 
	<div class = "titles_main_padge"><h4 align = "center">Разное</h4></div>		 
			 
	<table align = "center">
	 <tr>
		<th align = "center">Наш Дзен-канал</th><th align = "center">Наше сообщество</th>
	 </tr>
	 <tr>
		<td>
			 <a href="https://zen.yandex.ru/imagoz" rel = "nofollow"><img width = "75%" height = "75%" src="../zen-icon.png" alt="Наш Дзен-канал" title="zen.yandex.ru/imagoz"></a></td><td><script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

	<!-- VK Widget -->
	 <div id="vk_groups"></div>
		<script type="text/javascript">
		VK.Widgets.Group("vk_groups", {mode: 3, no_cover: 1, width: "160"}, 54027668);
	</script></td>
	 </tr>			 
	</table>		 
			 			 	
			
		</div>
		<div align = "justify" class = "post">
		  <div class = "posttitle"><h4>О проекте IMAGOZ</h4></div>
			<p>Добро пожаловать на портал <strong>IMAGOZ</strong> (от лат. imago - отражение)! Здесь мы объеденили в общую картину мира тему высоких технологий (hi-tech), индустрию компьютерных игр, 
			взгляд на самые необычные современные гаджеты, достижения науки и техники и насыщенную событиями жизнь интернета.</p>
			
			<p>Такой подход является на первый взгляд несколько 
			нестандартным, но мы считаем, что все эти тематики могут органично сочетаться, заинтересовав широкий круг разносторонне развитых читателей, которые хотят быть на острие 
			прогресса!</p>

			<p>Создатели портала <strong>IMAGOZ</strong> собирают самые интересные и актуальные новости и подают их в оригинальном авторском отражении. Мы не стремимся полностью охватить этот необъятный
			мир Hi-tech, науки, игр и прочего, но публикуем самые интересные материалы по этим темам.</p>
			
			<p>Стоит также отметить, что портал <strong>IMAGOZ</strong> возрождает такой казалось бы мёртвый в нашей стране своеобразный  жанр в публицистике, как <strong>"игрожур"</strong>. Игровая журналистика со своим своеобразным, самобытным 
			стилем изложения материала для многих связана с самыми тёплыми "ламповыми" воспоминаниями из 90-х, начала 2000 годов.</p> 
			
			<p><strong>IMAGOZ</strong> вбирает в себя лучшие черты этого условного жанра и порождает новое явление - <strong>Постигрожур</strong>. Постигрожур - публикации об играх и тому что интересно геймерам без "игрожура"!</p>  
		</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>

