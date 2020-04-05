<?php

$title = 'Hi-Tech новости, игры, наука, интернет в отражении на imagoz.ru';//Данные тега <title>
$headMain = '';
$robots = 'all';
$descr = 'Портал IMAGOZ. Место где мы рассматриваем мир Hi-Tech, игровую индустрию, науку и технику в оригинальном авторском отражении!';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Определение нахождения пользователя в системе*/
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Последняя рекомендованная новость*/
/*Команда SELECT*/

try
{
	$sql = 'SELECT posts.id AS postid, author.id AS idauthor, post, posttitle, imghead, imgalt, postdate, authorname, category.id AS categoryid, categoryname FROM posts 
			INNER JOIN author ON idauthor = author.id 
			INNER JOIN category ON idcategory = category.id 
			WHERE premoderation = "YES" AND zenpost = "NO" AND recommendationdate ORDER BY recommendationdate DESC LIMIT 4';//Вверху самое последнее значение
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
	$lastRecommPosts[] =  array ('id' => $row['postid'], 'idauthor' => $row['idauthor'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'postdate' =>  $row['postdate'], 'authorname' =>  $row['authorname'], 
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
}

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
	$newsIn[] =  array ('id' => $row['id'], 'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'newsdate' =>  $row['newsdate'],
						'imghead' =>  $row['imghead']);
}

/*Вывод списка случайных тегов для новостей и статей*/

/*Команда SELECT для тегов новостей*/
try
{
	$sql = 'SELECT DISTINCT metaname, meta.id FROM meta 
			INNER JOIN metapost ON idmeta = meta.id 
			INNER JOIN newsblock ON idnews = newsblock.id	
			ORDER BY rand() LIMIT 5';
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
			ORDER BY rand() LIMIT 5';
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
			ORDER BY rand() LIMIT 5';
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


/*Вывод топ-5*/

/*Вывод ТОП-5 новостей*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT id, newstitle, viewcount, averagenumber FROM newsblock WHERE premoderation = "YES" AND votecount > 1  ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
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
	$sql = 'SELECT id, posttitle, viewcount, averagenumber FROM posts WHERE premoderation = "YES" AND zenpost = "NO" AND votecount > 1 ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
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
	$sql = 'SELECT id, promotiontitle, viewcount, averagenumber FROM promotion WHERE premoderation = "YES" AND votecount > 1 ORDER BY averagenumber DESC LIMIT 5';//Вверху самое последнее значение
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
	$sql = 'SELECT id, authorname, avatar, countposts, rating FROM author WHERE countposts > 2 ORDER BY countposts DESC LIMIT 7';//Вверху самое последнее значение
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
	$authorsTOP[] =  array ('id' => $row['id'], 'authorname' => $row['authorname'], 'avatar' => $row['avatar'],
						    'countposts' => $row['countposts'], 'rating' => $row['rating']);
}

/*Вывод конкурсной статистики*/
/*Команда SELECT проверка запуска конкурса*/
try
{
	$sql = 'SELECT contestpanel FROM contest WHERE id = 1';//Вверху самое последнее значение
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
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

$row = $s -> fetch();
		
$contestPanel = $row['contestpanel'];//проверка на включение конкурса

if ($contestPanel == 'YES')//Если конкурс включен, выводится блок в панели
{
	$hederContest = '<div class = "titles_main_padge"><h4 align = "center">Результаты конкурса</h4></div>';
	
	try
	{
		$sql = 'SELECT id, authorname, avatar, contestscore FROM author WHERE contestscore > 0 ORDER BY contestscore DESC LIMIT 7';//Вверху самое последнее значение
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
		$contestsTOP[] =  array ('id' => $row['id'], 'authorname' => $row['authorname'], 'avatar' => $row['avatar'], 'contestscore' => $row['contestscore']);
	}

}

else
{
	$hederContest = '';
}


/*Вывод изображения дня*/
/*Команда SELECT*/

try
{
	$sql = 'SELECT posts.id AS postid, post, posttitle, imghead, imgalt, postdate, authorname, category.id AS categoryid, categoryname 
			FROM category 
			INNER JOIN posts ON idcategory = category.id
			INNER JOIN author ON idauthor = author.id			
			WHERE categoryname = "Изображение дня" AND premoderation = "YES" AND zenpost = "NO" ORDER BY postdate DESC LIMIT 1';//Вверху самое последнее значение
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
	$postsIMG[] =  array ('id' => $row['postid'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'postdate' =>  $row['postdate'], 'authorname' =>  $row['authorname'], 
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
}

/*Вывод промоушена*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT promotion.id AS promotionid, author.id AS idauthor, promotion, promotiontitle, imghead, imgalt, promotion.www, promotiondate, authorname, category.id AS categoryid, categoryname FROM promotion 
			INNER JOIN author ON idauthor = author.id 
			INNER JOIN category ON idcategory = category.id 
			WHERE premoderation = "YES" ORDER BY promotiondate DESC LIMIT 7';//Вверху самое последнее значение
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка вывода статей промоушена на главной странице ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$promotions[] =  array ('id' => $row['promotionid'], 'idauthor' => $row['idauthor'], 'text' => $row['promotion'], 'promotiontitle' =>  $row['promotiontitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'promotiondate' =>  $row['promotiondate'], 'authorname' =>  $row['authorname'], 'www' =>  $row['www'],
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
}

/*Вывод стаей*/
/*Команда SELECT*/
try
{
	$sql = 'SELECT posts.id AS postid, author.id AS idauthor, post, posttitle, imghead, imgalt, postdate, authorname, category.id AS categoryid, categoryname FROM posts 
			INNER JOIN author ON idauthor = author.id 
			INNER JOIN category ON idcategory = category.id 
			WHERE premoderation = "YES" ORDER BY postdate DESC LIMIT 7';//Вверху самое последнее значение
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
	$posts[] =  array ('id' => $row['postid'], 'idauthor' => $row['idauthor'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'postdate' =>  $row['postdate'], 'authorname' =>  $row['authorname'], 
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
}

include 'posts.html.php';
exit();



	