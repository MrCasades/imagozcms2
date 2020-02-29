<?php 
/*Вывод панели входа / регистрации. Вывод имени пользователя вошедшего в систему*/

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка ссылки для входа, регистрации*/
if (!isset($_SESSION['loggIn']))//если не выполнен вход в систему
{
	$logPanel = "<a href='/imagozcms/admin/registration/?log'>Вход</a> | <a href='/imagozcms/admin/registration/?reg'>Регистрация</a>";
}

/*Загрузка имени вошедшего пользователя и кнопки выхода из системы*/
else
{
	
	$_POST['author'] = authorLogin ($_SESSION['email'], $_SESSION['password']);
	$logPanel = '<form action = " " method = "post">
					Вы вошли как '.$_POST['author'].
					'<input type = "hidden" name = "action" value = "logout">
					<input type = "hidden" name = "goto" value = "/imagozcms/admin/">
					<input class="btn btn-primary btn-sm" type="submit" value="Exit">
			     </form>';
}
