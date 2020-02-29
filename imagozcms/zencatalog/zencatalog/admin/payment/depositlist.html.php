<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	
	<div class = "maincont"> 	
		<h3 align = "center">Внесённые платежи</h3>
		<table align = "center" border = "1">
		  <tr>
				<th width = "70 px">#id</th>
				<th width = "300 px">id в системе Яндекс.Деньги</th>
				<th width = "200 px">Сумма платежа</th>	
				<th width = "120 px">Дата</th>
				<th width = "200 px">Статус</th>
		  </tr> 
		  
		  <?php if (!isset($deposits))
		 {
			 $noPosts = '<p align = "center">Операции отсутствуют</p>';
			 echo $noPosts;
			 $deposits = null;
		 }
		 
		 else
		  
		 foreach ($deposits as $deposit): ?> 
		  <tr>
				<td><?php echo '# '.$deposit['id'];?></td>
				<td><?php echo $deposit['idoperation'];?></td>
				<td><?php echo $deposit['deposit'];?></td>
				<td><?php echo $deposit['depositdate'];?></td>
				<td><?php echo $deposit['depositstatus'];?></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table> 
	</div>	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>