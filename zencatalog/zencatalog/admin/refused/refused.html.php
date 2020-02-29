<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

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
			  	<th width = "250 px">Причина</th>
			    <th width = "250 px">Действие с материалом</th>
		  </tr> 
		  
		  <?php if (!isset($posts))
		 {
			 $noPosts = '<p align = "center">Отклонённые материалы отсутствуют</p>';
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
			    <td><?php echo $post['reasonrefusal'];?></td>
			    <td><form action = "/admin/addupdpost/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $post['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					  </form></td>
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
			    <th width = "250 px">Причина</th>
			    <th width = "250 px">Действие с материалом</th>
		  </tr> 
		  
		   <?php if (!isset($newsIn))
		 {
			 $noPosts = '<p align = "center">Отклонённые материалы отсутствуют</p>';
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
			  	<td><?php echo $news['reasonrefusal'];?></td>
			    <td><form action = "/admin/addupdnews/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $news['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					  </form></td>
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
			  	<th width = "250 px">Причина</th>
			    <th width = "250 px">Действие с материалом</th>
		  </tr> 
		  
		  <?php if (!isset($promotions))
		 {
			 $noPosts = '<p align = "center">Отклонённые материалы отсутствуют</p>';
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
			    <td><?php echo $promotion['reasonrefusal'];?></td>
			  	<td><form action = "/admin/addupdpromotion/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $promotion['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					  </form></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		<p><a name="bottom"></a></p>
	</div>
  		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>		