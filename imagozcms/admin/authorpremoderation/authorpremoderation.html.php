<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont">
		<div>
			<h3 align = "center">Статьи</h3>
		<table align = "center" border = "1">
		  <tr>
				<th width = "70 px">#id</th>
				<th width = "200 px">Дата публикации</th>
				<th width = "200 px">Заголовок</th>	
				<th width = "120 px">Автор</th>
				<th width = "200 px">E-mail</th>
		  </tr> 
		  
		  <?php if (!isset($posts))
		 {
			 $noPosts = '<p align = "center">Материалы в премодерации отсутствуют</p>';
			 echo $noPosts;
			 $posts = null;
		 }
		 
		 else
		  
		 foreach ($posts as $post): ?> 
		  <tr>
				<td><?php echo '# '.$post['id'];?></td>
				<td><?php echo $post['postdate'];?></td>
				<td><?php echo $post['posttitle'];?></td>
				<td><?php echo $post['authorname'];?></td>
				<td><?php echo $post['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		</div>	
		
		<hr/>
			<h3 align = "center">Новости</h3>
		<table align = "center" border = "1">
		  <tr>
				<th width = "70 px">#id</th>
				<th width = "200 px">Дата публикации</th>
				<th width = "200 px">Заголовок</th>	
				<th width = "120 px">Автор</th>
				<th width = "200 px">E-mail</th>	
		  </tr> 
		  
		   <?php if (!isset($newsIn))
		 {
			 $noPosts = '<p align = "center">Материалы в премодерации отсутствуют</p>';
			 echo $noPosts;
			 $newsIn = null;
		 }
		 
		 else
			 
		 foreach ($newsIn as $news): ?> 
		  <tr>
				<td><?php echo '# '.$news['id'];?></td>
				<td><?php echo $news['newsdate'];?></td>
				<td><?php echo $news['newstitle'];?></td>
				<td><?php echo $news['authorname'];?></td>
				<td><?php echo $news['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		
		<hr/>
		<h3 align = "center">Промоушен</h3>
		<table align = "center" border = "1">
		  <tr>
				<th width = "70 px">#id</th>
				<th width = "200 px">Дата публикации</th>
				<th width = "200 px">Заголовок</th>	
				<th width = "120 px">Автор</th>
				<th width = "200 px">E-mail</th>
		  </tr> 
		  
		  <?php if (!isset($promotions))
		 {
			 $noPosts = '<p align = "center">Материалы в премодерации отсутствуют</p>';
			 echo $noPosts;
			 $promotions = null;
		 }
		 
		 else
		  
		 foreach ($promotions as $promotion): ?> 
		  <tr>
				<td><?php echo '# '.$promotion['id'];?></td>
				<td><?php echo $promotion['promotiondate'];?></td>
				<td><?php echo $promotion['promotiontitle'];?></td>
				<td><?php echo $promotion['authorname'];?></td>
				<td><?php echo $promotion['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		<p><a name="bottom"></a></p>
	</div>

			
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>		