<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	  <p>Войдите в систему!</p>
	  <?php if (isset($errLogin)): ?>
		<p><?php htmlecho($errLogin); ?></p>
	  <?php endif; ?>	
	  <form action = " " method = "post">
		<div>
		 <label for = "email">Email: <input type = "text" name = "email" id = "email"></label>
		</div>
		<div>
		 <label for = "password">Пароль: <input type = "password" name = "password" id = "password"></label>
		</div>
		<div>
		 <input type = "hidden" name = "action" value = "login">
		 <input type = "submit" value = "Enter">
		</div>
	  </form>
	  <p><a href='/admin/'>Возврат к панели администрирования!</a></p>	  
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

