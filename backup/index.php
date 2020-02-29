<?php

$title = 'ImagozCMS - Главная страница';//Данные тега <title>
$headMain = 'Статьи в базе данных';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Определение нахождения пользователя в системе*/
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT posts.id, post, posttitle, meta.id, metaname, idmeta, idpost FROM posts INNER JOIN metapost ON posts.id = idpost
INNER JOIN meta ON meta.id = idmeta	ORDER BY posts.id DESC';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$posts[] =  array ('id' => $row['posts.id'], 'text' => $row['post'], 'metaname' => $row['metaname'], 'posttitle' =>  $row['posttitle']);
}


include 'posts.html.php';



	