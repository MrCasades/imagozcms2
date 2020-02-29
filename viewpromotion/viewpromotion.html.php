<?php 

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func_promotion.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont_for_view">
		<div align="center">
		 <table>
		 <tr>
		  <td valign="top"><label for = "meta"> Теги:</label></td> 
		  <?php if (empty($metas))
			  {
				 echo '';
		      }
		 
		      else 
		  
			  foreach ($metas as $meta): ?>	  
				<td><div>	 
					<a href="/viewmetapromotion/?metaid=<?php echo $meta['id']; ?>"><?php echomarkdown ($meta['metaname']); ?></a>	 
				</div></td> 	
				<?php endforeach; ?>
		  </tr>
		 </table>
		</div>
		
		<div class = "post">
		 <?php foreach ($promotions as $promotion): ?> 	  
			<div  align="justify">
			
				<div class = "posttitle">
				  <?php echo ($promotion['promotiondate']. ' | Автор: <a href="/account/?id='.$promotion['idauthor'].'" style="color: white" >'.$promotion['authorname']).'</a>';?>
				  <p>Рубрика: <a href="../viewcategory/?id=<?php echo $promotion['categoryid']; ?>" style="color: white"><?php echo $promotion['categoryname'];?></a>
					<?php if ($promotion['www'] != '')//если автор приложил ссылку
						{
							$link = '| <a href="//'.$promotion['www'].'" style="color: white" rel = "nofollow">Ссылка на ресурс</a>';
							echo $link;
						}?></p>
				</div>
				  <p><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
				  <script src="//yastatic.net/share2/share.js"></script>
				  <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></p>
			   <hr>
				  <!-- Yandex.RTB R-A-448222-9 -->
                    <div id="yandex_rtb_R-A-448222-9"></div>
                    <script type="text/javascript">
                        (function(w, d, n, s, t) {
                            w[n] = w[n] || [];
                            w[n].push(function() {
                                Ya.Context.AdvManager.render({
                                    blockId: "R-A-448222-9",
                                    renderTo: "yandex_rtb_R-A-448222-9",
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
				  <hr>
				    <p class="like"> 
				     <img width = "5%" height = "5%" src="/viewpromotion/view.jpg" alt="Число просмотров материала" title="Просмотры"> <?php htmlecho ($promotion['viewcount']); ?> 
				     <img width = "3%" height = "3%" src="/viewpromotion/like.jpg" alt="Оценка материала" title="Оценка"> <?php htmlecho ($promotion['averagenumber']); ?>
					</p>
					<?php if ($promotion['imghead'] == '')
					{
						$img = '';//если картинка в заголовке отсутствует
						echo $img;
					}
						else 
					{
						$img = '/images/'.$promotion['imghead'];//если картинка присутствует
					}?>
					
					<div class = "img_post" style = "background: url(<?php echo $img; ?>);
													 -o-background-size: 100% auto; 
    												-webkit-background-size: 100% auto;
   												    -moz-background-size: 100% auto; 
 												    background-size: 100% auto; "></div>	
					<p><?php echomarkdown ($promotion['text']); ?></p>
					<p align="center"><?php echo $video; ?></p>
					<p><?php echo $votePanel; ?></p>
					<p><?php echo $delAndUpd; ?></p>
					<p><?php echo $premoderation; ?></p>
					<p><strong><a href="https://zen.yandex.ru/imagoz" rel = "nofollow">
						<img width = "5%" height = "5%" src="/viewpromotion/zen-icon.png" alt="Наш Дзен-канал" title="zen.yandex.ru/imagoz">Подписывайтесь на наш Дзен-канал!</a></strong>
					</p>
					<div align="center"><?php echo $recommendation; ?></div>
			</div>			
		 <?php endforeach; ?>
		</div>
		<div>
		 <h4>Случайные статьи рубрики</h4>
			
		<div class="columns">
		<?php if (empty($similarPosts))
		 {
			 echo '<p align = "center">Новости отсутствуют</p>';
		 }
		 
		 else
			 
		 foreach ($similarPosts as $post_1): ?> 
		<div class="columns__panel">
         <div class="columns__panel-content">
			<div class = "post_for_columns" style = "background: url(/images/<?php echo $post_1['imghead']; ?>); background-size: cover; ">
				<strong><a href="/viewpromotion/?id=<?php htmlecho ($post_1['id']); ?>" rel = "nofollow">.</a></strong> 
			</div>
			<strong><a href="/viewpromotion/?id=<?php htmlecho ($post_1['id']); ?>"><?php htmlecho ((implode(' ', array_slice(explode(' ', strip_tags($post_1['promotiontitle'])), 0, 7)))); ?>...</a></strong> 
		  </div>	 
		</div>	 
		 <?php endforeach; ?>
	   </div>

		 <div align="center"><h4>Комментарии (<?php echo $countPosts; ?>)</h4>
		 <a href="?addcomment#bottom" class="btn btn-primary">Добавить комментарий</a></div>
		<div>
		<?php if (empty ($comments))
				{
					echo '<br/><p align="center">Комментарии отсутствуют!</p>';
				}
				
			  else
				
				foreach ($comments as $comment): ?> 	   		
				<div class = "post">
				 <div class = "posttitle">
				    Дата комментария: <?php echo ($comment['date']. ' | Автор: <a href="/account/?id='.$comment['idauthor'].'" style="color: white" >'.$comment['authorname']).'</a>';?>
				  </div>		
					<p><?php 
				   
						/*Вывод меню редактирования и удаления комментария для автора*/
						 if (isset($_SESSION['loggIn']))
						 {
							$authorName = authorLogin ($_SESSION['email'], $_SESSION['password']);//имя автора вошедшего в систему
						 }
						 else
						 {
							 $authorName = '';
						 }
						 if (($authorName == $comment['authorname']) || (userRole('Администратор')))
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
							
						 echo $updAnddel;?></p>
				  <p>
					<table cellpadding = "3 %">
						<td><img width = "90 px" height = "90 px" src="/avatars/<?php echo $comment['avatar'];?>" alt="<?php echo $comment['authorname'];?>"></td>
						<td ><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($comment['text'])), 0, 50))); ?> [...]</td>
					</table>	
				  </p>
				  <p><img width = "3%" height = "3%" src="<?php echo '//'.$_SERVER['SERVER_NAME'];?>/answers.jpg" alt="Ответы на комментарий" title="Количество ответов"> 
					  <strong>[<?php echo $comment['subcommentcount']; ?>]</strong></p>
				  <a href="/viewwallpost/?id=<?php echo $comment['id']; ?>" class="btn btn-primary btn-sm">Открыть</a>
				</div>	  		   
				<?php endforeach; ?> 
				
				<div align = "center">
				 <?php
				 /*Постраничный вывод информации*/
				 for ($i = 1; $i <= $pagesCount; $i++) 
				 {
					 // если текущая старница
					 if($i == $page)
					 {
						 echo "<a href='/viewpost/?id=".$idPromotion."&page=$i' class='btn btn-info'>$i</a> ";
					 } 
					 else 
					 {
						 echo "<a href='/viewpost/?id=".$idPromotion."&page=$i' class='btn btn-primary btn-sm'>$i</a> ";
					 }
				 }?>
				</div>	
		</div>		
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>