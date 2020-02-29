<?php

$title = 'ImagozCMS - Главная страница';//Данные тега <title>
$headMain = 'Статьи в базе данных';

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT * FROM posts';
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
	$posts[] =  array ('id' => $row['id'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'postdate' => $row['postdate']);
}

include 'posts.html.php';

if (isset ($_GET['id']))
{
	$idPost = $_GET['id'];
}
try
{	
	if (!empty($idPost))
	{
		$sql = 'SELECT * FROM posts WHERE id = ?';
		$result = $pdo->query($sql);
		$viewPost = array($idPost);
	}	
	$result->execute($viewPost);
	
	for ($i = 0; $row = $result->fetch(); $i++)
	{
		$posts[] =  array ('id' => $row['id'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'postdate' => $row['postdate']);
	}
}
catch (PDOException $e)
{
	$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}	
		
include 'viewpost.html.php';	


	