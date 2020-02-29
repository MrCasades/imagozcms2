<?php
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Загрузка статей по тематике*/
if (isset ($_GET['metaid']))
{
	$idMeta = $_GET['metaid'];
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	try
	{
		$sql = 'SELECT posts.id, post, posttitle, postdate, metaname, authorname, idauthor FROM posts 
				INNER JOIN author ON author.id = idauthor 
				INNER JOIN meta ON meta.id = '.$idMeta;//Вверху самое последнее значение
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
		$metas_1[] =  array ('id' => $row['id'], 'text' => $row['post'], 'posttitle' => $row ['posttitle'], 'date' => $row['postdate'], 'authorname' => $row['authorname'],
							'metaname' => $row['metaname']);
	}
	
	$title = 'ImagozCMS | '.$row['metaname'];//Данные тега <title>
	$headMain = 'Статьи рубрики '. '"'.$row['metaname'].'"';
	
	include 'metapost.html.php';
	exit();		

}	
	