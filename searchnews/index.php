<?php
/*Загрузка главного пути*/
include_once '../includes/path.inc.php';

/*Вывод информации для формы поиска*/

$title = 'Поиск новостей | imagoz.ru';
$headMain = 'Поиск новостей';
$robots = 'noindex, follow';
$descr = 'В данном разделе осуществляется поиск информации';
	
/*Загрузка функций для формы входа*/
require_once MAIN_FILE . '/includes/access.inc.php';
	
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Формирование запроса SELECT*/
	
if (isset($_GET['action']) && ($_GET['action']) == 'search')
{
	/*Подключение к базе данных*/
	include MAIN_FILE . '/includes/db.inc.php';
		
	/*Переменные для выражения SELECT*/
	$select = 'SELECT newsblock.id AS newsid, news, newstitle, imghead, imgalt, newsdate, authorname, author.id AS authorid, category.id AS categoryid, categoryname';
	$from = ' FROM newsblock 
			  INNER JOIN author ON idauthor = author.id 
			  INNER JOIN category ON idcategory = category.id';
	$where = ' WHERE TRUE AND premoderation = "YES"';
		
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
		$from .= ' INNER JOIN metapost ON newsblock.id = idnews';
		$where .= " AND metapost.idmeta = :idmeta";
		$forSearch[':idmeta'] = $_GET['meta'];
	}
	*/
		
	/*Поле строки*/
	if ($_GET['newstext'] != '')//Если выбрана какая-то строка
	{
		$where .= " AND news LIKE :news";
		$forSearch[':news'] = '%'. $_GET['newstext']. '%';	
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
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка поиска : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	foreach ($s as $row)
	{
			$newsIn[] = array('id' => $row['newsid'], 'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'newsdate' =>  $row['newsdate'], 'authorname' =>  $row['authorname'], 'idauthor' =>  $row['authorid'],
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
	}
		
	include 'searchnews.html.php';
	exit();
}
	
/*Подключение к базе данных*/
include MAIN_FILE . '/includes/db.inc.php';
	
/*Если нужен поиск по авторам
try
{
	$result = $pdo -> query ('SELECT id, authorname FROM author');
}
catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
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
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
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
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
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
	
	