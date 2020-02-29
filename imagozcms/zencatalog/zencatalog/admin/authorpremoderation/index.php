<?php

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

/*Вывод материалов для премодерации*/
if (userRole('Автор'))
{

	/*возврат ID автора*/
	$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	/*Вывод новостей*/
	/*Команда SELECT*/

	try
	{
		$sql = 'SELECT newsblock.id, newstitle, newsdate, authorname, email, reasonrefusal FROM newsblock INNER JOIN author 
				ON idauthor = author.id WHERE premoderation = "NO" AND refused = "NO" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
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
								'authorname' =>  $row['authorname'], 'email' =>  $row['email']);
	}

	/*Вывод стаей*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT posts.id, posttitle, postdate, authorname, email, reasonrefusal FROM posts INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "NO" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
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
								'authorname' =>  $row['authorname'], 'email' =>  $row['email']);
	}
	
	/*Вывод промоушен*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT promotion.id, promotiontitle, promotiondate, authorname, email, reasonrefusal FROM promotion INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "NO" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
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
								'authorname' =>  $row['authorname'], 'email' =>  $row['email']);
	}
	
	if (!isset($newsIn) && !isset($posts) && !isset($promotions))
	{
		$title = 'Материалы отсутствуют';//Данные тега <title>
		$headMain = 'Материалы отсутствуют';
		$robots = 'noindex, nofollow';
		$descr = 'Вданном разделе выводятся материалы которые находятся в премодерации';
	}
	
	else
	{
		$title = 'Материалы в премодерации';//Данные тега <title>
		$headMain = 'Материалы автора '.$row['authorname'].' в премодерации';
		$robots = 'noindex, nofollow';
		$descr = 'Вданном разделе выводятся материалы которые находятся в премодерации';
	}

	include 'authorpremoderation.html.php';
	exit();
}

/*Вывод рекламных материалов для премодерации*/
if (userRole('Рекламодатель'))
{

	/*возврат ID автора*/
	$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Вывод промоушен*/
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT promotion.id, promotiontitle, promotiondate, authorname, email, reasonrefusal FROM promotion INNER JOIN author 
		ON idauthor = author.id WHERE premoderation = "NO" AND refused = "NO" AND idauthor = '.$selectedAuthor.' LIMIT 10';//Вверху самое последнее значение
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
								'authorname' =>  $row['authorname'], 'email' =>  $row['email']);
	}
	
	if (!isset($promotions))
	{
		$title = 'Материалы отсутствуют';//Данные тега <title>
		$headMain = 'Материалы отсутствуют';
		$robots = 'noindex, nofollow';
		$descr = 'Вданном разделе выводятся материалы которые находятся в премодерации';
	}

	else
	{
		$title = 'Материалы в премодерации';//Данные тега <title>
		$headMain = 'Материалы автора '.$row['authorname'].' в премодерации';
		$robots = 'noindex, nofollow';
		$descr = 'Вданном разделе выводятся материалы которые находятся в премодерации';
	}
	
	include 'authorpremodpromotion.html.php';
	exit();
}