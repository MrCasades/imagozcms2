<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
		<div>
			<h3 align = "center">Промоушен</h3>
		<table align = "center" border = "1">
		  <tr>
				<th width = "70 px">#id</th>
				<th width = "200 px">Дата публикации</th>
				<th width = "200 px">Заголовок</th>	
				<th width = "120 px">Автор</th>
				<th width = "200 px">E-mail</th>
			  	<th width = "250 px">Причина</th>
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
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		<p><a name="bottom"></a></p>
		</div>	
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>		