<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont"> 
		
		<p align="center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></p>	
	
		<div>
		<p><?php echo $updAndDelAvatar; ?></p>
		<p><?php echo $mainMessagesForm; ?></p>
		
		 <?php foreach ($authors as $author): ?> 
		   <p><img width = "150 px" height = "150 px" src="/avatars/<?php echo $author['avatar'];?>" alt="<?php echo $author['authorname'];?>"></p>
		   <p><?php if (($authorRole == 'Автор') || ($authorRole == 'Администратор'))//если пользователю присвоен определённый статус, то выводятся его ранг
				
				{
					echo ('<strong> Авторский ранг: '.$rangView.' </strong>'.$score.
						  '<p><strong> Рейтинг: '.$rating.'</strong></p>'.
						  '<p>'.$payForm.'</p>'.$payFormIn);
					echo $prices;
					echo $openTable;
					echo $paysystemName;
					echo $ewallet;
					echo $updEwalletDate;
					echo $closeTable;
				}?></p>
			
			<p><?php if ($authorRole == 'Рекламодатель')//если пользователю присвоен определённый статус, то выводятся его ранг
				
				{
					echo ($score.'<p>'.$payForm.'</p>'.$payFormIn);
				}?></p>
			
			<p><?php echo $addRole; ?></p>
			<p><?php echo $addBonus; ?></p>
			<p><?php echo $addRoleAdvertiser; ?></p>
			<div>
				    <strong>Сайт:</strong> <?php if ($author['www'] != '')//если автор приложил ссылку
						{
							$linkAuthor = '<a href="//'.$author['www'].'" rel = "nofollow">'.$author['www'].'</a>';
							echo $linkAuthor;
						}?> 
				<br/>
				<br/>
				<p><h4>Дополнительная информация:</h4></p>
				<p align="justify"><?php echomarkdown ($author['accountinfo']);?></p>	
			</div>			
		 <?php endforeach; ?>
		 <p><?php echo $changePass; ?></p>
		 <p><?php echo $updAccountInfo; ?></p>

		<div>
			<?php 
			if (!empty ($favourites))
			{
				echo '<h3 align = "center">Избранные материалы пользователя</h3>';
			}
			
			if (empty ($favourites)) 
				{
					echo '<div align = "center" class = "post">Здесь отображаются материалы добавленные пользователем в избранное</div>';
					$favourites = '';
				}
		 	
			else
		 
		 foreach ($favourites as $favourite): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ($favourite['date']. ' | Автор: <a href="/account/?id='.$favourite['idauthorpost'].'" style="color: white" >'.$favourite['authorname']).'</a>';?>
					<p>Рубрика: <a href="viewcategory/?id=<?php echo $favourite['categoryid']; ?>" style="color: white"><?php echo $favourite['categoryname'];?></a></p> 
				  </div>
				  	 
				   <div class = "newstext">
				    <h3 align = "center"><?php htmlecho ($favourite['title']); ?></h3>
				    <div class = "newsimg">
					   <?php if ($favourite['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
						 else 
						{
							$img = '<img width = "90%" height = "90%" src="/images/'.$favourite['imghead'].'"'. ' alt="'.$favourite['imgalt'].'"'.'>';//если картинка присутствует
						}?>
					  <p><?php echo $img;?></p>
				     </div>
					<p align = "justify"><?php echomarkdown ($favourite['post']); ?> [...]</p>
					<?php echo $favourite['url']; ?> 
				   </div>	
				 </div>
			<?php endforeach; ?>
		</div>	
			
			<?php if (!empty ($favourites)) {echo '<div class="for_allposts_link"><p align = "center"><a href="./viewallfavourites/?id='.$idAuthor.'" style="color: white">Всё избранное автора</a></p></div>';}?>
		 
		 <div>
		  <?php if (($authorRole == 'Автор') || ($authorRole == 'Администратор'))//если пользователю присвоен определённый статус, то выводятся написанные им материалы
				{
					include $_SERVER['DOCUMENT_ROOT']. '/account/postandnews.inc.html.php';
				}?>
		</div>
	
		 <div align="center"><h4>Стена (<?php echo $countPosts; ?>)</h4>
		 <a href="?addcomment" class="btn btn-primary">Добавить запись</a></div>
		<div>
		<?php if (empty ($comments))
				{
					echo'<p align="center">Записи на стене отсутствуют!</p>';
				}
				
			  else
				
				foreach ($comments as $comment): ?> 	   		
				<div class = "post">
				 <div class = "posttitle">
				    Дата записи: <?php echo ($comment['date']. ' | Автор: <a href="/account/?id='.$comment['idauthor'].'" style="color: white" >'.$comment['authorname']).'</a>';?>
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
							
						 echo $updAnddel;?></p>
						<?php if ($comment['imghead'] == '')
						{
							$img = '';//если картинка в заголовке отсутствует
							echo $img;
						}
							else 
						{
							$img = '<p align="center"><img width = "40%" height = "20%" src="/images/'.$comment['imghead'].'"'. ' alt="'.$comment['imgalt'].'"'.'></p>';//если картинка присутствует
						}?>
					<p><?php echo $img;?></p>
				  <p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($comment['text'])), 0, 50))); ?> [...]</p>
				  <p><img width = "5%" height = "5%" src="<?php echo '//'.$_SERVER['SERVER_NAME'];?>/answers.jpg" alt="Ответы на комментарий" title="Количество ответов"> 
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
						 echo "<a href='/account/?id=".$idAuthor."&page=$i' class='btn btn-info'>$i</a> ";
					 } 
					 else 
					 {
						 echo "<a href='/account/?id=".$idAuthor."&page=$i' class='btn btn-primary btn-sm'>$i</a> ";
					 }
				 }?>
				 </div>				
	
	
		</div>
	</div>		
	


<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>