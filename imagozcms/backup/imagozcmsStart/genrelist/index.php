<?php

/*Подключение к базе данных mylibrary*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT idgenre, genrename FROM genre';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Ошибка выбора жанра: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$genres[] =  array ('idgenre' => $row['idgenre'], 'genrename' => $row['genrename']);
}

include 'genre.html.php';

/*Добавление информации в таблицу author*/

	/*Загрузка шаблона form.html.php по ссылке*/
if (isset($_GET['add']))//Если есть переменная add выводится форма
{
	$padgeTitle = 'Новый жанр';// Переменные для формы "Жанр"
	$action = 'addform';
	$genrename = '';
	$idgenre = '';
	$button = 'Добавить жанр';
	
	include 'form.html.php';
	exit();
}
if (isset ($_GET['addform']))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'INSERT INTO genre SET genrename = :genrename';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':genrename', $_POST['genrename']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	

/*Редактирование информации в таблице genre*/

if (isset ($_POST['action']) && ($_POST['action'] == 'Upd'))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
	$sql = 'SELECT idgenre, genrename FROM genre WHERE idgenre = :idgenre';
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> bindValue(':idgenre', $_POST['idgenre']);//отправка значения
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
	$error = 'Error select : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	$row = $s -> fetch();
	
	$padgeTitle = 'Редактировать жанр';// Переменные для формы "Жанр"
	$action = 'editform';
	$genrename = $row['genrename'];
	$idgenre = $row['idgenre'];
	$button = 'Обновить информацию об издательстве';
	
	include 'form.html.php';
	exit();
	
}
	/*Команда UPDATE*/
if (isset ($_GET['editform']))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'UPDATE genre SET genrename = :genrename WHERE idgenre = :idgenre';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idgenre', $_POST['idgenre']);//отправка значения
		$s -> bindValue(':genrename', $_POST['genrename']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Error Update: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	

/*Удаление из таблици genre*/

if (isset ($_POST['action']) && ($_POST['action'] == 'Del'))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	
	{
		$sql = 'DELETE FROM genre WHERE idgenre = :idgenre';// - псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idgenre', $_POST['idgenre']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	
