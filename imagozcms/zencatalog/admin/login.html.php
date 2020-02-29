<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont_for_view">
	 <div class = "post" align="center">
	  <?php if (isset($errLogin)): ?>
		<p><?php htmlecho($errLogin); ?></p>
	  <?php endif; ?>	
	  <form action = " " method = "post">
	   <table>	
		<tr>
		 <th>Email: </th><td><input type = "text" name = "email" id = "email"></td>
		</tr> 		
		<tr>
		 <th>Пароль: </th><td><input type = "password" name = "password" id = "password"></td>	
		<tr>
		 <td><input type = "hidden" name = "action" value = "login">
		 <input type = "submit" value = "Enter" class="btn btn-primary"></td>
		</tr> 
	   </table>
	  </form>	
     </div>	 
	 <p align="center"><a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a></p>	
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

