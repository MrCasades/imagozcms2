<?php 
/*Вывод новостей*/
/*Команда SELECT*/

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

try
{
	$sql = 'SELECT * FROM newsblock WHERE premoderation = "YES" ORDER BY newsdate DESC LIMIT 10';//Вверху самое последнее значение
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
	$newsIn[] =  array ('id' => $row['id'], 'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'newsdate' =>  $row['newsdate']);
}

/*Вывод списка случайных тегов для новостей и статей*/

/*Команда SELECT для тегов новостей*/
try
{
	$sql = 'SELECT DISTINCT metaname, meta.id FROM meta 
			INNER JOIN metapost ON idmeta = meta.id 
			INNER JOIN newsblock ON idnews = newsblock.id	
			ORDER BY rand() LIMIT 3';
	$result = $pdo->query($sql);
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
foreach ($result as $row)
{
	$metas_1[] =  array ('id' => $row['id'], 'meta' => $row['metaname']);
}

/*Команда SELECT для тегов новостей*/
try
{
	$sql = 'SELECT DISTINCT metaname, meta.id FROM meta 
			INNER JOIN metapost ON idmeta = meta.id 
			INNER JOIN posts ON idpost = posts.id	
			ORDER BY rand() LIMIT 3';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора тегов статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$metas_2[] =  array ('id' => $row['id'], 'meta' => $row['metaname']);
}

/*Команда SELECT для тегов промоушена*/
try
{
	$sql = 'SELECT DISTINCT metaname, meta.id FROM meta 
			INNER JOIN metapost ON idmeta = meta.id 
			INNER JOIN promotion ON idpromotion = promotion.id	
			ORDER BY rand() LIMIT 3';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора тегов статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$metas_3[] =  array ('id' => $row['id'], 'meta' => $row['metaname']);
}

/*Вывод ТОП-5 новостей*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT id, newstitle, viewcount, averagenumber FROM newsblock WHERE premoderation = "YES" ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора новостей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$newsInTOP[] =  array ('id' => $row['id'], 'newstitle' => $row['newstitle'], 'viewcount' => $row['viewcount'], 'averagenumber' => $row['averagenumber']);
}

/*Вывод ТОП-5 статей*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT id, posttitle, viewcount, averagenumber FROM posts WHERE premoderation = "YES" ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$postsTOP[] =  array ('id' => $row['id'], 'posttitle' => $row['posttitle'], 'viewcount' => $row['viewcount'], 'averagenumber' => $row['averagenumber']);
}

/*Вывод ТОП-5 промоушен*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT id, promotiontitle, viewcount, averagenumber FROM promotion WHERE premoderation = "YES" ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$promotionsTOP[] =  array ('id' => $row['id'], 'promotiontitle' => $row['promotiontitle'], 'viewcount' => $row['viewcount'], 'averagenumber' => $row['averagenumber']);
}

/*Вывод ТОП-5 авторов*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT id, authorname, avatar FROM author WHERE countposts > 2 ORDER BY countposts DESC LIMIT 5';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора статей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$authorsTOP[] =  array ('id' => $row['id'], 'authorname' => $row['authorname'], 'avatar' => $row['avatar']);
}

include 'metapanel.inc.html.php';