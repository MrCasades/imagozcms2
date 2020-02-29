<?php
/*Вывод информации для формы поиска*/

$title = 'Поиск';
$headMain = 'Поиск статей';
	
/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
	
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Формирование запроса SELECT*/
	
if (isset($_GET['action']) && ($_GET['action']) == 'search')
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
		
	/*Переменные для выражения SELECT*/
	$select = 'SELECT posts.id, post, posttitle';
	$from = ' FROM posts';
	$where = ' WHERE TRUE';
		
	$forSearch = array();//массив заполнения запроса
		
	/*Выбор автора*/
	/*
	if ($_GET['author'] != '')//Если выбран автор
	{
		$where .= " AND idauthor = :idauthor";
		$forSearch[':idauthor'] = $_GET['author'];
	}
	*/
		
	/*Выбор рубрики*/
	if ($_GET['category'] != '')//Если выбрана рубрика
	{
		$where .= " AND idcategory = :idcategory";
		$forSearch[':idcategory'] = $_GET['category'];
	}
		
	/*Выбор тематики*/
	/*
	if ($_GET['meta'] != '')//Если выбрана тематика
	{
		$from .= ' INNER JOIN metapost ON posts.id = idpost';
		$where .= " AND metapost.idmeta = :idmeta";
		$forSearch[':idmeta'] = $_GET['meta'];
	}
	*/
		
	/*Поле строки*/
	if ($_GET['text'] != '')//Если выбрана какая-то строка
	{
		$where .= " AND post LIKE :post";
		$forSearch[':post'] = '%'. $_GET['text']. '%';	
	}
		
	/*Объеденение переменных в запрос*/
	try
	{
		$sql = $select.$from.$where;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute($forSearch);// метод дает инструкцию PDO отправить запрос MySQL. Т. к. массив $forSearch хранит значение всех псевдопеременных 
								  // не нужно указывать их по отдельности с помощью bindValue									
	}

	catch (PDOException $e)
	{
		$error = 'Ошибка поиска : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	foreach ($s as $row)
	{
			$posts[] = array('id' => $row['id'], 'text' => $row['post'], 'posttitle' => $row ['posttitle']);
	}
		
	include 'searchpost.html.php';
	exit();
}
	
/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
/*Если нужен поиск по авторам
try
{
	$result = $pdo -> query ('SELECT id, authorname FROM author');
}
catch (PDOException $e)
{
	$error = 'Ошибка вывода author '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}
	
foreach ($result as $row)
{
	$authors[] = array('id' => $row['id'], 'authorname' => $row['authorname']);
}
*/
	
try
{
	$result = $pdo -> query ('SELECT id, categoryname FROM category');
}
catch (PDOException $e)
{
	$error = 'Ошибка вывода category '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}
	
foreach ($result as $row)
{
	$categorys[] = array('id' => $row['id'], 'categoryname' => $row['categoryname']);
}
	
/*Если нужен поиск по тегам
try
{
	$result = $pdo -> query ('SELECT id, metaname FROM meta');
}
catch (PDOException $e)
{
	$error = 'Ошибка вывода meta '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}
	
foreach ($result as $row)
{
	$metas[] = array('id' => $row['id'], 'metaname' => $row['metaname']);
}
*/
	
include 'searchform.html.php';
exit();
	
	