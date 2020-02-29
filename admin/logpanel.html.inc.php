<?php 
/*Вывод панели входа / регистрации. Вывод имени пользователя вошедшего в систему*/

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка ссылки для входа, регистрации*/
if (!isset($_SESSION['loggIn']))//если не выполнен вход в систему
{
	$logPanel = "<a href='/admin/registration/?log#bottom'>Вход</a> | <a href='/admin/registration/?reg#bottom'>Регистрация</a>";
}

/*Загрузка имени вошедшего пользователя и кнопки выхода из системы*/
else
{
	$_POST['author'] = authorLogin ($_SESSION['email'], $_SESSION['password']);
	
	/*Возврат id автора*/
	
	$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
		{
			$sql = 'SELECT count(unread) AS unreadcount FROM mainmessages WHERE unread = "YES" AND idto = '.$selectedAuthor;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		}

		catch (PDOException $e)
		{
			$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
			$headMain = 'Ошибка данных!';
			$robots = 'noindex, nofollow';
			$descr = '';
			$error = 'Ошибка подсчёта сообщений ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}
	
	$row = $s -> fetch();
		
	$unreadCount = $row['unreadcount'];//счётчик непрочитанных сообщений
	
	$logPanel = '<form action = " " method = "post">
					<strong>Профиль:</strong> <a href="/account/?id='.$selectedAuthor.'">'.$_POST['author'].'</a> | <a href="/mainmessages/#bottom" class="btn btn-info btn-sm">СООБЩЕНИЯ ['.$unreadCount.']</a>
					<input type = "hidden" name = "action" value = "logout">
					<input type = "hidden" name = "goto" value = "/../">
					<input class="btn btn-primary btn-sm" type="submit" value="Exit">
			     </form>';
}
