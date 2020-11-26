<?php
/*Загрузка главного пути*/
include_once '../../includes/path.inc.php';

/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once MAIN_FILE . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

$idAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

$title = 'Настройка аккаунта';//Данные тега <title>
$headMain = 'Настройка аккаунта';
$robots = 'noindex, follow';
$descr = '';

include MAIN_FILE . '/includes/db.inc.php';
	
/*Выбор аватара для изменения*/
try
{
	$sql = 'SELECT avatar, authorname FROM author WHERE id = :id';
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> bindValue(':id', $idAuthor);//отправка значения
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
}
	
catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка вывода аккаунта ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

$row = $s -> fetch();
		
$avatar = $row['avatar'];	
$authorName = $row['authorname'];

/*Если установлен аватар по умолчанию, то его нельзя удалить*/
$delAva = $avatar === "ava-def.jpg" ? '' : '<input type = "submit" name = "action" class="btn btn-primary btn-sm" value = "Удалить аватар">';

include 'setaccount.html.php';
exit();