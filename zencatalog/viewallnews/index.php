<?php

$title = 'Каталог новостей | imagoz.ru';//Данные тега <title>
$headMain = 'Все новости';
$robots = 'noindex, follow';
$descr = 'В данном разделе отображаются все новости портала';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Определение нахождения пользователя в системе*/
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Постраничный вывод информации*/
		
$page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;// помещаем номер страницы из массива GET в переменую $page
$onPage = 10;// количество статей на страницу
$shift = ($page - 1) * $onPage;// (номер страницы - 1) * статей на страницу

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Вывод новостей*/
/*Команда SELECT*/

try
{
	$sql = 'SELECT newsblock.id AS newsid, news, author.id AS authorid, newstitle, imghead, imgalt, newsdate, authorname, category.id AS categoryid, categoryname FROM newsblock 
			INNER JOIN author ON idauthor = author.id 
			INNER JOIN category ON idcategory = category.id 
			WHERE premoderation = "YES" ORDER BY newsdate DESC LIMIT '.$shift.' ,'.$onPage;//Вверху самое последнее значение
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
	$newsIn[] =  array ('id' => $row['newsid'], 'idauthor' => $row['authorid'], 'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
						'newsdate' =>  $row['newsdate'], 'authorname' =>  $row['authorname'], 
						'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid']);
}

/*Определение количества статей*/
try
{
	$sql = "SELECT count(*) AS all_articles FROM newsblock WHERE premoderation = 'YES'";
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка подсчёта новостей ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}
	
foreach ($result as $row)
{
	$numPosts[] = array('all_articles' => $row['all_articles']);
}
	
$countPosts = $row["all_articles"];
$pagesCount = ceil($countPosts / $onPage);

include 'viewallnews.html.php';
exit();
