<?php 

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
	
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Вывод статей по категориям*/

if (isset ($_GET['id']))
{
		
	$idCategory = $_GET['id'];
	$select = 'SELECT posts.id, post, posttitle, postdate, idauthor, idcategory, categoryname, authorname FROM posts
			INNER JOIN category
			ON idcategory = category.id
			INNER JOIN author
			ON idauthor = author.id 
			WHERE idcategory = ';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = $select.$idCategory;
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
		$categorys_1[] =  array ('id' => $row['id'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'postdate' => $row['postdate'],
								'category' => $row['categoryname'], 'author' => $row['authorname']);
	}	
	
	$title = 'ImagozCMS | '.$row['categoryname'];//Данные тега <title>
	$headMain = 'Статьи рубрики '. '"'.$row['categoryname'].'"';
	
	include 'categorypost.html.php';
	exit();
}