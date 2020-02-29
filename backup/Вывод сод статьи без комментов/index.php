<?php

/*Загрузка содержимого статьи*/
if (isset ($_GET['id']))
{
	$idPost = $_GET['id'];
	$select = 'SELECT * FROM posts WHERE id = ';

	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = $select.$idPost;
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
	
	$title = 'ImagozCMS | '.$row['posttitle'];//Данные тега <title>
	$headMain = $row['posttitle'];
		
	include 'viewpost.html.php';
	exit();
	
	/*Добавление комментария*/
}

