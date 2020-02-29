<?php

$title = 'ImagozCMS - Главная страница';//Данные тега <title>
$headMain = 'Книги в базе данных';

/*Подключение к базе данных mylibrary*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT idbook, bookname, description, bookdate, authorname, genrename FROM book 
	INNER JOIN author 
	ON book.idauthor = author.idauthor
	INNER JOIN genre
	ON book.idgenre = genre.idgenre';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Error table "Genre": ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$bookname[] =  array ('idbook' => $row['idbook'], 'text' => $row['bookname'], 'description' => $row['description'], 'authorname' => $row['authorname'],
	'bookdate' => $row['bookdate'], 'genrename' => $row['genrename']);
}

include 'book.html.php';


	