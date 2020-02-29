<?php 
/*Вывод списка рубрик*/

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT * FROM category';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Error select categorys' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$categorys[] =  array ('id' => $row['id'], 'category' => $row['categoryname']);
}

include 'categorypanel.inc.html.php';