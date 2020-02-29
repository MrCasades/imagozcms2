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
		  
		   <?php if (!isset($newsIn))
		 {
			 $noPosts = '<p align = "center">Материалы для премодерации отсутствуют</p>';
			 echo $noPosts;
			 $newsIn = null;
		 }
		 
		 else
			 
		 foreach ($newsIn as $news): ?> 
		  <tr>
				<td><?php echo '# '.$news['id'];?></td>
				<td><?php echo $news['newsdate'];?></td>
				<td><a href="/admin/premoderation/viewpremodnews/?news=<?php echo $news['id'];?>"><?php echo $news['newstitle'];?></a></td>
				<td><?php echo $news['authorname'];?></td>
				<td><?php echo $news['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		</div>	
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>	