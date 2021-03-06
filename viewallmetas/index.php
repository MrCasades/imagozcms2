<?php
/*Загрузка главного пути*/
include_once '../includes/path.inc.php';

/*Загрузка функций для формы входа*/
require_once MAIN_FILE . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Загрузка статей по тематике*/
if (isset ($_GET['metaid']))
{
	$idCategory = $_GET['metaid'];

	/*Подключение к базе данных*/
	include MAIN_FILE . '/includes/db.inc.php';
	
	try
	{
		$sql = 'SELECT newsblock.id AS newsid, author.id AS authorid, news, newstitle, imghead, imgalt, newsdate, authorname, category.id AS categoryid, categoryname, metaname FROM meta 
				INNER JOIN metapost	ON meta.id = idmeta
				INNER JOIN newsblock ON newsblock.id = idnews 
				INNER JOIN author ON author.id = idauthor 
				INNER JOIN category ON category.id = idcategory WHERE premoderation = "YES" AND meta.id = :id ORDER BY newsdate DESC LIMIT 5';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':id', $_GET['metaid']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL. Т. к. массив $forSearch хранит значение всех псевдопеременных 
								  // не нужно указывать их по отдельности с помощью bindValue	
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора тегов новостей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($s as $row)
	{
		$metas_news[] =  array ('id' => $row['newsid'], 'idauthor' => $row['authorid'], 'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
							'newsdate' =>  $row['newsdate'], 'authorname' =>  $row['authorname'], 
							'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid'],
							'metaname' => $row['metaname']);
	}

	try
	{
		$sql = 'SELECT promotion.id AS promotionid, promotion, promotiontitle, author.id AS authorid, imghead, imgalt, promotion.www, promotiondate, authorname, category.id AS categoryid, categoryname, metaname FROM meta 
				INNER JOIN metapost	ON meta.id = idmeta
				INNER JOIN promotion ON promotion.id = idpromotion
				INNER JOIN author ON author.id = idauthor 
				INNER JOIN category ON idcategory = category.id 
				WHERE premoderation = "YES" AND meta.id = :id ORDER BY promotiondate DESC LIMIT 5';//Вверху самое последнее значение
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':id', $_GET['metaid']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL. Т. к. массив $forSearch хранит значение всех псевдопеременных 
								  // не нужно указывать их по отдельности с помощью bindValue	
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = ' ';
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($s as $row)
	{
		$metas_prom[] =  array ('id' => $row['promotionid'], 'idauthor' => $row['authorid'], 'text' => $row['promotion'], 'promotiontitle' =>  $row['promotiontitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
							'promotiondate' =>  $row['promotiondate'], 'authorname' =>  $row['authorname'], 'www' =>  $row['www'],
							'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid'],
							'metaname' => $row['metaname']);
	}

	try
	{
		$sql = 'SELECT p.id AS postid, post, posttitle, a.id AS authorid, imghead, imgalt, postdate, authorname, c.id AS categoryid, categoryname, metaname FROM meta m
				INNER JOIN metapost mp	ON m.id = idmeta
				INNER JOIN posts p ON p.id = idpost 
				INNER JOIN author a ON a.id = idauthor 
				INNER JOIN category c ON idcategory = c.id 
				WHERE premoderation = "YES" AND zenpost = "NO" AND m.id = :id ORDER BY postdate DESC LIMIT 5';//Вверху самое последнее значение
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':id', $_GET['metaid']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL. Т. к. массив $forSearch хранит значение всех псевдопеременных 
								  // не нужно указывать их по отдельности с помощью bindValue	
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = ' ';
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($s as $row)
	{
		$metas_post[] =  array ('id' => $row['postid'], 'idauthor' => $row['authorid'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
							'postdate' =>  $row['postdate'], 'authorname' =>  $row['authorname'], 
							'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid'],
							'metaname' => $row['metaname']);
	}
		
	
	$title = $row['metaname'].' | imagoz.ru';//Данные тега <title>
	$headMain = 'Материалы по тегу "'.$row['metaname'].'"';
	$robots = 'noindex, follow';
	$descr = 'В даном разделе отображаются все материалы, помеченные тегом '.$row['metaname'];
		
	include 'viewallmetas.html.php';
	exit();		

}	