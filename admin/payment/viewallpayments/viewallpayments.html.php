<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont">
		<div>
		<table align = "center" border = "1">
		  <tr>
				<th>#id заявки</th>
				<th>Дата создания</th>	
				<th>Автор</th>
				<th>E-mail</th>	
			    <th>Сумма</th>
			    <th>Платёжная система</th>	
			    <th>Кошелёк</th>
			    <th>Просмотр</th>
		  </tr> 
		  
		   <?php if (!isset($payments))
		 {
			 $noPosts = '<p align = "center">Заявки отсутствуют</p>';
			 echo $noPosts;
			 $payments = null;
		 }
		 
		 else
			 
		 foreach ($payments as $payment): ?> 
		  <tr>
				<td><?php echo '# '.$payment['id'];?></td>
				<td><?php echo $payment['creationdate'];?></td>
			    <td><?php echo $payment['authorname'];?></td>
				<td><?php echo $payment['email'];?></td>
			    <td><?php echo $payment['payment'];?></td>
			    <td><?php echo $payment['paysystemname'];?></td>
				<td><?php echo $payment['ewallet'];?></td>
				<td><a href="/admin/payment/viewallpayments/viewpayment/?id=<?php echo $payment['id'];?>">Просмотр</a></td>
		  </tr> 				
		 <?php endforeach; ?> 
		</table>
		</div>	
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>	