<?php

$title = 'Отклонённые материалы';//Данные тега <title>
$headMain = 'Отклонённые материалы';
$robots = 'noindex, nofollow';
$descr = 'Вданном разделе выводятся материалы которые были отклонены от публикации';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка формы входа*/
if (!loggedIn())
{
	include '../login.html.php';
	exit();
}

/*Загрузка сообщения об ошибке входа*/
if (!userRole('Администратор') && !userRole('Автор') && !userRole('Рекламодатель'))
{
	$error = 'Доступ запрещен';
	include '../accessfail.html.php';
	exit();
}

/*Вывод отклонённых материалов*/

/*возврат ID автора*/
$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

if (userRole('Автор'))//Для автора
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	/*Вывод новостей*/
	/*Команда SELECT*/

	try
	{
		$sql = 'SELECT newsblock.id, newstitle, newsdate, authorname, email, reasonrefusal FROM newsblock INNER JOIN author 
				ON idauthor = author.id WHERE premoderation = "NO" AND refused = "YES" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода новостей на главной странице ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$newsIn[] =  array ('id' => $row['id'], 'newstitle' =>  $row['newstitle'], 'newsdate' =>  $row['newsdate'], 
								'authorname' =>  $row['authorname'], 'email' =>  $row['email'], 'reasonrefusal' =>  $row['reasonrefusal']);
	}

	/*Вывод стаей*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT posts.id, posttitle, postdate, authorname, email, reasonrefusal FROM posts INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "YES" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода статей на главной странице ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$posts[] =  array ('id' => $row['id'], 'posttitle' =>  $row['posttitle'], 'postdate' =>  $row['postdate'], 
								'authorname' =>  $row['authorname'], 'email' =>  $row['email'], 'reasonrefusal' =>  $row['reasonrefusal']);
	}
	
	/*Вывод Промоушен*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT promotion.id, promotiontitle, promotiondate, authorname, email, reasonrefusal FROM promotion INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "YES" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$promotions[] =  array ('id' => $row['id'], 'promotiontitle' =>  $row['promotiontitle'], 'promotiondate' =>  $row['promotiondate'], 
								'authorname' =>  $row['authorname'], 'email' =>  $row['email'], 'reasonrefusal' =>  $row['reasonrefusal']);
	}

	include 'refused.html.php';
	exit();
}

if (userRole('Рекламодатель'))//Для рекламодателя
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	/*Вывод стаей*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT promotion.id, promotiontitle, promotiondate, authorname, email, reasonrefusal FROM promotion INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "YES" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$promotions[] =  array ('id' => $row['id'], 'promotiontitle' =>  $row['promotiontitle'], 'promotiondate' =>  $row['promotiondate'], 
								'authorname' =>  $row['authorname'], 'email' =>  $row['email'], 'reasonrefusal' =>  $row['reasonrefusal']);
	}

	include 'refusedpromotion.html.php';
	exit();
}