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
		  
		   <?php if (!isset($promotions))
		 {
			 $noPosts = '<p align = "center">Материалы для премодерации отсутствуют</p>';
			 echo $noPosts;
			 $promotions = null;
		 }
		 
		 else
			 
		 foreach ($promotions as $promotion): ?> 
		  <tr>
				<td><?php echo '# '.$promotion['id'];?></td>
				<td><?php echo $promotion['promotiondate'];?></td>
				<td><a href="/admin/premoderation/viewpremodpromotion/?promotion=<?php echo $promotion['id'];?>"><?php echo $promotion['promotiontitle'];?></a></td>
				<td><?php echo $promotion['authorname'];?></td>
				<td><?php echo $promotion['email'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		</div>	
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>	