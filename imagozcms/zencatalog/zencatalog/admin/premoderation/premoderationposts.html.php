<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
		<div>
		<table align = "center" border = "1">
		  <tr>
				<th>#id</th>
				<th>Дата публикации</th>
				<th>Заголовок</th>	
				<th>Автор</th>
				<th>E-mail</th>				
		  </tr> 
		  
		  <?php if (!isset($posts))
		 {
			 $noPosts = '<p align = "center">Материалы для премодерации отсутствуют</p>';
			 echo $noPosts;
			 $posts = null;
		 }
		 
		 else
		  
		 foreach ($posts as $post): ?> 
		  <tr>
				<td><?php echo '# '.$post['id'];?></td>
				<td><?php echo $post['postdate'];?></td>
				<td><a href="/admin/premoderation/viewpremodpost/?post=<?php echo $post['id'];?>"><?php echo $post['posttitle'];?></a></td>
				<td><?php echo $post['authorname'];?></td>
				<td><?php echo $post['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		</div>	
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>		